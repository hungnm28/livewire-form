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
    public function boot(){
        $this->registerComponent();
        $this->registerPublishing();
    }

    protected function registerComponent()
    {

        // Nạp views với namespace "livewire-form"
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-form');
        // Đăng ký anonymous Blade components (tự động nhận <x-lf::button>)
        Blade::anonymousComponentNamespace('livewire-form::components', 'lf');

    }
    protected function registerPublishing()
    {
        // Cho phép publish views nếu cần override ngoài app
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/lf'),
        ], 'livewire-form-views');
    }


}
