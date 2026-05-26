<?php

namespace Hungnm28\LivewireForm\Tests;

use Hungnm28\LivewireForm\LivewireFormServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LivewireFormServiceProvider::class,
        ];
    }
}
