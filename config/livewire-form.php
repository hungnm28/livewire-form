<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme
    |--------------------------------------------------------------------------
    |
    | The default accent color written to the package layout's data-theme
    | attribute. The host application still owns the Tailwind theme mapping.
    |
    */
    'theme' => 'orange',

    /*
    |--------------------------------------------------------------------------
    | Module Cookies
    |--------------------------------------------------------------------------
    |
    | UI preferences are stored as module-scoped cookies. For example, the
    | "admin" module stores theme_color as "admin-theme-color".
    |
    */
    'cookies' => [
        'theme' => [
            'suffix' => 'theme',
            'default' => 'dark',
        ],
        'theme_color' => [
            'suffix' => 'theme-color',
            'default' => null,
        ],
        'aside_mode' => [
            'suffix' => 'aside-mode',
            'default' => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Assets
    |--------------------------------------------------------------------------
    |
    | Set "use_cdn_icons" to false when the host app bundles Tabler icons itself.
    | The JavaScript files are published as source files and should be imported
    | by the host app's Vite entrypoint.
    |
    */
    'assets' => [
        'use_cdn_icons' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Package Livewire components are registered here as alias => class pairs.
    | Example: 'lf-user-form' => \Hungnm28\LivewireForm\Livewire\UserForm::class
    |
    */
    'livewire' => [
        'components' => [
            'lf-menu-theme' => __DIR__.'/../resources/views/livewire/⚡menu-theme.blade.php',
            'lf-theme-setting' => __DIR__.'/../resources/views/livewire/⚡theme-color.blade.php',
            'lf-aside-mode' => __DIR__.'/../resources/views/livewire/⚡aside-mode.blade.php',
        ],
    ],
];
