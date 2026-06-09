<?php

namespace Hungnm28\LivewireForm\Support;

use Illuminate\Support\Facades\Cookie;

class ModuleCookie
{
    public static function key(string $module, string $name): string
    {
        return $module.'-'.self::suffix($name);
    }

    public static function get(string $module, string $name, mixed $default = null): mixed
    {
        return request()->cookie(
            self::key($module, $name),
            $default ?? self::default($name),
        );
    }

    public static function forever(string $module, string $name, string $value): void
    {
        Cookie::queue(Cookie::forever(self::key($module, $name), $value));
    }

    public static function default(string $name): mixed
    {
        $default = config("livewire-form.cookies.{$name}.default");

        if ($default !== null) {
            return $default;
        }

        return match ($name) {
            'theme_color' => config('livewire-form.theme', 'orange'),
            'aside_mode' => '',
            default => null,
        };
    }

    protected static function suffix(string $name): string
    {
        $suffix = config("livewire-form.cookies.{$name}.suffix");

        if (is_string($suffix) && $suffix !== '') {
            return $suffix;
        }

        return str_replace('_', '-', $name);
    }
}
