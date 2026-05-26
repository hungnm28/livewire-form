<?php

namespace Hungnm28\LivewireForm;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LivewireFormServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/livewire-form.php', 'livewire-form');
    }

    public function boot(): void
    {
        $this->registerViews();
        $this->registerBladeComponents();
        $this->registerPublishing();
    }

    protected function registerViews(): void
    {
        // Namespace views: livewire-form::...
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-form');
    }

    protected function registerBladeComponents(): void
    {
        /**
         * Anonymous components:
         * resources/views/components/button.blade.php
         * => <x-lf::button />
         *
         * Lưu ý: anonymousComponentNamespace nhận "view namespace", không phải đường dẫn.
         * livewire-form::components => resources/views/components/*
         */
        Blade::anonymousComponentNamespace('livewire-form::components', 'lf');

        // Nếu bạn có components class-based thì dùng:
        // Blade::componentNamespace('Hungnm28\\LivewireForm\\View\\Components', 'lf');
    }

    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/livewire-form'),
        ], 'livewire-form-views');

        $this->publishes([
            __DIR__.'/../config/livewire-form.php' => config_path('livewire-form.php'),
        ], 'livewire-form-config');

        $this->publishes([
            __DIR__.'/../resources/js' => resource_path('js/vendor/livewire-form'),
        ], 'livewire-form-assets');
    }
}
