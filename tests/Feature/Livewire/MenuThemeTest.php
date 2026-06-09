<?php

namespace Hungnm28\LivewireForm\Tests\Feature\Livewire;

use Hungnm28\LivewireForm\Tests\TestCase;
use Livewire\Livewire;

class MenuThemeTest extends TestCase
{
    public function test_it_renders_theme_menu_actions(): void
    {
        Livewire::test('lf-menu-theme')
            ->assertSee('data-action="cycleTheme"', false)
            ->assertSee('data-action="toggleFullscreen"', false)
            ->assertSee('$store.themeSetting.show()', false);
    }

    public function test_it_can_hide_fullscreen_button(): void
    {
        Livewire::test('lf-menu-theme', ['showFullscreen' => false])
            ->assertDontSee('data-action="toggleFullscreen"', false);
    }
}
