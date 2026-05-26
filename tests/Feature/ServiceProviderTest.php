<?php

namespace Hungnm28\LivewireForm\Tests\Feature;

use Hungnm28\LivewireForm\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_package_config_is_merged(): void
    {
        $this->assertSame('orange', config('livewire-form.theme'));
        $this->assertTrue(config('livewire-form.assets.use_cdn_icons'));
    }

    public function test_package_views_are_registered(): void
    {
        $this->assertTrue(view()->exists('livewire-form::components.form.input'));
        $this->assertTrue(view()->exists('livewire-form::components.modal.index'));
        $this->assertTrue(view()->exists('livewire-form::components.table.index'));
    }
}
