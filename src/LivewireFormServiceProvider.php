<?php

namespace Hungnm28\LivewireForm;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireFormServiceProvider extends ServiceProvider
{

    public function register()
    {
        parent::register();
    }

    public function boot()
    {
        $this->registerPublishing();
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../resources/views/components' => base_path("resources/views/components/lf"),
            __DIR__ . '/../resources/assets/sass/livewire-form' => base_path("resources/assets/sass/livewire-form"),
            __DIR__ . '/../publishes/assets/css/livewire-form.css' => public_path("assets/css/livewire-form.css"),
        ], 'livewire-form');

    }

}
