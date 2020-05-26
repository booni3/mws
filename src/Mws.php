<?php

namespace Booni3\Mws;

use Booni3\Mws\Api\AmazonFeed;
use Booni3\Mws\Api\AmazonFeedList;
use Booni3\Mws\Api\AmazonFeedResult;
use Booni3\Mws\Api\AmazonFinancialEventList;
use Booni3\Mws\Api\AmazonFinancialGroupList;
use Booni3\Mws\Api\AmazonFulfillmentOrder;
use Booni3\Mws\Api\AmazonFulfillmentOrderCreator;
use Booni3\Mws\Api\AmazonFulfillmentOrderList;
use Booni3\Mws\Api\AmazonFulfillmentPreview;
use Booni3\Mws\Api\AmazonInventoryList;
use Booni3\Mws\Api\AmazonMerchantServiceList;
use Booni3\Mws\Api\AmazonMerchantShipment;
use Booni3\Mws\Api\AmazonMerchantShipmentCreator;
use Booni3\Mws\Api\AmazonOrder;
use Booni3\Mws\Api\AmazonOrderItemList;
use Booni3\Mws\Api\AmazonOrderList;
use Booni3\Mws\Api\AmazonOrderSet;
use Booni3\Mws\Api\AmazonPackageTracker;
use Booni3\Mws\Api\AmazonParticipationList;
use Booni3\Mws\Api\AmazonPreorder;
use Booni3\Mws\Api\AmazonPrepInfo;
use Booni3\Mws\Api\AmazonProduct;
use Booni3\Mws\Api\AmazonProductFeeEstimate;
use Booni3\Mws\Api\AmazonProductInfo;
use Booni3\Mws\Api\AmazonProductList;
use Booni3\Mws\Api\AmazonProductSearch;
use Booni3\Mws\Api\AmazonRecommendationList;
use Booni3\Mws\Api\AmazonReport;
use Booni3\Mws\Api\AmazonReportAcknowledger;
use Booni3\Mws\Api\AmazonReportList;
use Booni3\Mws\Api\AmazonReportRequest;
use Booni3\Mws\Api\AmazonReportRequestList;
use Booni3\Mws\Api\AmazonReportScheduleList;
use Booni3\Mws\Api\AmazonReportScheduleManager;
use Booni3\Mws\Api\AmazonServiceStatus;
use Booni3\Mws\Api\AmazonShipment;
use Booni3\Mws\Api\AmazonShipmentItemList;
use Booni3\Mws\Api\AmazonShipmentList;
use Booni3\Mws\Api\AmazonShipmentPlanner;
use Booni3\Mws\Api\AmazonSubscription;
use Booni3\Mws\Api\AmazonSubscriptionDestinationList;
use Booni3\Mws\Api\AmazonSubscriptionList;
use Booni3\Mws\Api\AmazonTransport;
use Booni3\Mws\Api\AmazonTransportDocument;

class Mws
{
    protected $store;

    public function __construct(string $store, array $config)
    {
        $this->store = $store;

        config()->set('mws', [
            $store => [
                'serviceUrl' => $config['serviceUrl'] ?? null,
                'merchantId' => $config['merchantId'] ?? null,
                'keyId' => $config['keyId'] ?? null,
                'secretKey' => $config['secretKey'] ?? null,
                'MWSAuthToken' => $config['MWSAuthToken'] ?? null
            ]
        ]);
    }

    public static function make($store, $config): self
    {
        return new static($store, $config);
    }

    public function feed(): AmazonFeed
    {
        return new AmazonFeed($this->store);
    }

    public function feedList(): AmazonFeedList
    {
        return new AmazonFeedList($this->store);
    }

    public function feedResult(): AmazonFeedResult
    {
        return new AmazonFeedResult($this->store);
    }

    public function financialEventList(): AmazonFinancialEventList
    {
        return new AmazonFinancialEventList($this->store);
    }

    public function financialGroupList(): AmazonFinancialGroupList
    {
        return new AmazonFinancialGroupList($this->store);
    }

    public function fulfillmentOrder(): AmazonFulfillmentOrder
    {
        return new AmazonFulfillmentOrder($this->store);
    }

    public function fulfillmentOrderCreator(): AmazonFulfillmentOrderCreator
    {
        return new AmazonFulfillmentOrderCreator($this->store);
    }

    public function fulfillmentOrderList(): AmazonFulfillmentOrderList
    {
        return new AmazonFulfillmentOrderList($this->store);
    }

    public function fulfillmentPreview(): AmazonFulfillmentPreview
    {
        return new AmazonFulfillmentPreview($this->store);
    }

    public function inventoryList(): AmazonInventoryList
    {
        return new AmazonInventoryList($this->store);
    }

    public function merchantServiceList(): AmazonMerchantServiceList
    {
        return new AmazonMerchantServiceList($this->store);
    }

    public function merchantShipment(): AmazonMerchantShipment
    {
        return new AmazonMerchantShipment($this->store);
    }

    public function merchantShipmentCreator(): AmazonMerchantShipmentCreator
    {
        return new AmazonMerchantShipmentCreator($this->store);
    }

    public function order(): AmazonOrder
    {
        return new AmazonOrder($this->store);
    }

    public function orderItemList(): AmazonOrderItemList
    {
        return new AmazonOrderItemList($this->store);
    }

    public function orderList(): AmazonOrderList
    {
        return new AmazonOrderList($this->store);
    }

    public function orderSet(): AmazonOrderSet
    {
        return new AmazonOrderSet($this->store);
    }

    public function packageTracker(): AmazonPackageTracker
    {
        return new AmazonPackageTracker($this->store);
    }

    public function participationList(): AmazonParticipationList
    {
        return new AmazonParticipationList($this->store);
    }

    public function preorder(): AmazonPreorder
    {
        return new AmazonPreorder($this->store);
    }

    public function prepInfo(): AmazonPrepInfo
    {
        return new AmazonPrepInfo($this->store);
    }

    public function product(): AmazonProduct
    {
        return new AmazonProduct($this->store);
    }

    public function productFeeEstimate(): AmazonProductFeeEstimate
    {
        return new AmazonProductFeeEstimate($this->store);
    }

    public function productInfo(): AmazonProductInfo
    {
        return new AmazonProductInfo($this->store);
    }

    public function productList(): AmazonProductList
    {
        return new AmazonProductList($this->store);
    }

    public function productSearch(): AmazonProductSearch
    {
        return new AmazonProductSearch($this->store);
    }

    public function recommendationList(): AmazonRecommendationList
    {
        return new AmazonRecommendationList($this->store);
    }

    public function report(): AmazonReport
    {
        return new AmazonReport($this->store);
    }

    public function reportAcknowledger(): AmazonReportAcknowledger
    {
        return new AmazonReportAcknowledger($this->store);
    }

    public function reportList(): AmazonReportList
    {
        return new AmazonReportList($this->store);
    }

    public function reportRequest(): AmazonReportRequest
    {
        return new AmazonReportRequest($this->store);
    }

    public function reportRequestList(): AmazonReportRequestList
    {
        return new AmazonReportRequestList($this->store);
    }

    public function reportScheduleList(): AmazonReportScheduleList
    {
        return new AmazonReportScheduleList($this->store);
    }

    public function reportScheduleManager(): AmazonReportScheduleManager
    {
        return new AmazonReportScheduleManager($this->store);
    }

    public function serviceStatus(): AmazonServiceStatus
    {
        return new AmazonServiceStatus($this->store);
    }

    public function shipment(): AmazonShipment
    {
        return new AmazonShipment($this->store);
    }

    public function shipmentItemList(): AmazonShipmentItemList
    {
        return new AmazonShipmentItemList($this->store);
    }

    public function shipmentList(): AmazonShipmentList
    {
        return new AmazonShipmentList($this->store);
    }

    public function shipmentPlanner(): AmazonShipmentPlanner
    {
        return new AmazonShipmentPlanner($this->store);
    }

    public function subscription(): AmazonSubscription
    {
        return new AmazonSubscription($this->store);
    }

    public function subscriptionDestinationList(): AmazonSubscriptionDestinationList
    {
        return new AmazonSubscriptionDestinationList($this->store);
    }

    public function subscriptionList(): AmazonSubscriptionList
    {
        return new AmazonSubscriptionList($this->store);
    }

    public function transport(): AmazonTransport
    {
        return new AmazonTransport($this->store);
    }

    public function transportDocument(): AmazonTransportDocument
    {
        return new AmazonTransportDocument($this->store);
    }
}
