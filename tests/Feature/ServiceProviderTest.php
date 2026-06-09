<?php

namespace Hungnm28\LivewireForm\Tests\Feature;

use Hungnm28\LivewireForm\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_package_config_is_merged(): void
    {
        $this->assertSame('orange', config('livewire-form.theme'));
        $this->assertTrue(config('livewire-form.assets.use_cdn_icons'));
        $this->assertArrayHasKey('lf-menu-theme', config('livewire-form.livewire.components'));
        $this->assertFileExists(config('livewire-form.livewire.components.lf-menu-theme'));
        $this->assertArrayHasKey('lf-theme-setting', config('livewire-form.livewire.components'));
        $this->assertFileExists(config('livewire-form.livewire.components.lf-theme-setting'));
    }

    public function test_package_views_are_registered(): void
    {
        $this->assertTrue(view()->exists('livewire-form::components.form.input'));
        $this->assertTrue(view()->exists('livewire-form::components.modal.index'));
        $this->assertTrue(view()->exists('livewire-form::components.table.index'));
    }
}
