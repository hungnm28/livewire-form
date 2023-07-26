<?php

namespace Hungnm28\LivewireForm;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireFormServiceProvider extends ServiceProvider
{
    protected $components = [
    ];

    public function register()
    {
        parent::register();
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lf-form');
        $this->registerComponent();
        $this->registerPublishing();
    }

    protected function registerComponent()
    {
        foreach ($this->components as $component) {
            $path = resource_path("views/components/lf/") . str_replace(".", "/", $component) . ".blade.php";
            if (!file_exists($path)) {
                Blade::component('lf-form::components.' . $component, 'lf.' . $component);
            }
        }
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../resources/views/components' => base_path("resources/views/components/lf")
        ], 'livewire-form');

    }

}
