<?php

namespace Hungnm28\LivewireForm\Tests\Feature\Livewire;

use Hungnm28\LivewireForm\Tests\TestCase;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class ThemeSettingTest extends TestCase
{
    public function test_it_uses_config_theme_by_default(): void
    {
        Livewire::test('lf-theme-setting')
            ->assertSet('module', 'admin')
            ->assertSet('theme', 'orange');
    }

    public function test_it_reads_theme_from_module_cookie(): void
    {
        Route::get('/theme-setting-test', fn () => Blade::render('<livewire:lf-theme-setting />'));

        $this->withUnencryptedCookie('admin-theme-color', 'blue')
            ->get('/theme-setting-test')
            ->assertOk()
            ->assertSee("document.body.setAttribute('data-theme', 'blue')", false);
    }

    public function test_it_stores_selected_theme_in_cookie(): void
    {
        Livewire::test('lf-theme-setting', ['module' => 'portal'])
            ->call('setTheme', 'emerald')
            ->assertSet('theme', 'emerald');

        $cookie = Cookie::queued('portal-theme-color');

        $this->assertNotNull($cookie);
        $this->assertSame('emerald', $cookie->getValue());
    }

    public function test_it_ignores_invalid_theme_values(): void
    {
        Livewire::test('lf-theme-setting')
            ->call('setTheme', 'invalid')
            ->assertSet('theme', 'orange');

        $this->assertNull(Cookie::queued('admin-theme-color'));
    }
}
