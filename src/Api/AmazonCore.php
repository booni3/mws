<?php

namespace Booni3\Mws\Api;

use Exception;
use Illuminate\Support\Facades\Log;

class AmazonCore extends AmazonCoreBase
{
    protected function __construct($s, $mock = false, $m = null, $config = null)
    {
        if (is_null($config)){
            $config = config('mws-config', null);
        }

        $this->setConfig($config);
        $this->setStore($s);
        $this->setMock($mock, $m);

        $this->env=__DIR__.'/../environment.php';
        $this->options['SignatureVersion'] = 2;
        $this->options['SignatureMethod'] = 'HmacSHA256';
    }

    public function setStore($s=null)
    {
        $store = $this->config;

        if(array_key_exists($s, $store)){
             $this->storeName = $s;

            if(array_key_exists('merchantId', $store[$s])){
                $this->options['SellerId'] = $store[$s]['merchantId'];
            } else {
                throw new \Exception('Merchant ID is missing!');
            }

            if(array_key_exists('keyId', $store[$s])){
                $this->options['AWSAccessKeyId'] = $store[$s]['keyId'];
            } else {
                throw new \Exception('Access Key ID is missing!');
            }

            if(!array_key_exists('secretKey', $store[$s])){
                throw new \Exception('Secret Key is missing!');
            }

            if (!empty($store[$s]['serviceUrl'])) {
                $this->urlbase = $store[$s]['serviceUrl'];
            } else {
                throw new \Exception('Service URL is empty');
            }

            if (!empty($store[$s]['MWSAuthToken'])) {
                $this->options['MWSAuthToken'] = $store[$s]['MWSAuthToken'];
            }

        } else {
            throw new \Exception("Store $s does not exist!");
        }
    }

    public function setConfig($config)
    {
        if(! isset($config[$this->storeName])) {
            $this->config = $config;
        } else {
            throw new Exception("Config file does not contain valid store key");
        }
    }

    protected function log($msg, $level = 'Info'){
        if ($msg != false) {
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

            if (isset($muteLog) && $muteLog == true){
                return;
            }

            switch ($level){
                case('Info'):
                case('Throttle'):
                    Log::info($msg);
                    return;
                case('Warning'):
                    Log::warning($msg);
                    return;
                case('Urgent'):
                    Log::error($msg);
                    return;
                default:
                    Log::info($msg);
                    return;
            }

        } else {
            return false;
        }
    }

    protected function genQuery(){
        if(! $store = config('mws-config', null)){
            throw new Exception('Config file does not exist!');
        }

        if (array_key_exists($this->storeName, $store) && array_key_exists('secretKey', $store[$this->storeName])){
            $secretKey = $store[$this->storeName]['secretKey'];
        } else {
            throw new Exception("Secret Key is missing!");
        }

        unset($this->options['Signature']);
        $this->options['Timestamp'] = $this->genTime();
        $this->options['Signature'] = $this->_signParameters($this->options, $secretKey);
        return $this->_getParametersAsString($this->options);
    }

}