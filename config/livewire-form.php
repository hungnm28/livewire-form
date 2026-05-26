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
];
