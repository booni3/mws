<?php

namespace Booni3\Mws\Tests;

use Orchestra\Testbench\TestCase;
use Booni3\Mws\MwsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MwsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
