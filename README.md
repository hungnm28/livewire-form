# Livewire Form

Reusable Blade UI components for Laravel and Livewire applications.

## Requirements

- PHP 8.3+
- Laravel 10, 11, 12, 13
- Livewire 3 or 4
- Tailwind CSS in the host application
- Alpine.js for modal, aside, fullscreen, and theme interactions
- Tabler Icons Webfont for icon components

Livewire ships Alpine for the common setup. If your app overrides Livewire's frontend assets, make sure Alpine is still available for interactive components.

## Installation

```bash
composer require hungnm28/livewire-form
```

Laravel auto-discovers the service provider. The package registers anonymous Blade components under the `lf` prefix:

```blade
<x-lf::form.input name="email" label="Email" />
<x-lf::btn.primary type="submit">Save</x-lf::btn.primary>
<x-lf::modal title="Edit user">...</x-lf::modal>
```

## Publishing

```bash
php artisan vendor:publish --tag=livewire-form-config
php artisan vendor:publish --tag=livewire-form-views
php artisan vendor:publish --tag=livewire-form-assets
```

The assets publish to `resources/js/vendor/livewire-form`.

## Tailwind

Add the package views to your Tailwind content paths so the component classes are generated:

```js
// tailwind.config.js
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './vendor/hungnm28/livewire-form/resources/views/**/*.blade.php',
  ],
};
```

The components use `primary-*` color utilities. Define them in your application theme, or map `primary` to one of your existing palettes.

## JavaScript

If you publish package assets, import them from your app entrypoint:

```js
// resources/js/app.js
import './vendor/livewire-form/app';
```

If you prefer to import directly from `vendor`, use:

```js
import '../../vendor/hungnm28/livewire-form/resources/js/app';
```

The JavaScript powers:

- aside open/close via `data-action="toggleAside"` and `data-action="closeAside"`
- light/dark/system theme cycling via `data-action="cycleTheme"`
- fullscreen toggling via `data-action="toggleFullscreen"`
- the Alpine `themeSetting` store used by `<x-lf::theme.setting />`

## Components

Form:

```blade
<x-lf::form>
    <x-lf::form.input name="name" label="Name" />
    <x-lf::form.select
        name="role"
        label="Role"
        :data="['admin' => 'Admin', 'editor' => 'Editor']"
    />
    <x-lf::form.textarea name="bio" label="Bio" />
    <x-lf::form.checkbox name="active" label="Active" value="1" />
    <x-lf::form.toggle name="published" label="Published" value="1" />
</x-lf::form>
```

Livewire binding:

```blade
<x-lf::form.input wire:model="form.email" label="Email" />
```

Buttons:

```blade
<x-lf::btn.primary>Primary</x-lf::btn.primary>
<x-lf::btn.success>Success</x-lf::btn.success>
<x-lf::btn.danger>Delete</x-lf::btn.danger>
<x-lf::btn.link.primary href="/users">Users</x-lf::btn.link.primary>
```

Table:

```blade
<x-lf::table title="Users" description="Manage user accounts" density="comfortable">
    <x-slot:tools>
        <x-lf::btn.primary>New user</x-lf::btn.primary>
    </x-slot:tools>

    <x-lf::table.thead>
        <x-lf::table.tr>
            <x-lf::table.th sortable direction="asc">Name</x-lf::table.th>
            <x-lf::table.th>Email</x-lf::table.th>
            <x-lf::table.th align="right">Status</x-lf::table.th>
            <x-lf::table.th align="right">Actions</x-lf::table.th>
        </x-lf::table.tr>
    </x-lf::table.thead>

    <x-lf::table.tbody>
        <x-lf::table.tr>
            <x-lf::table.td strong nowrap>Nguyen Manh Hung</x-lf::table.td>
            <x-lf::table.td muted>hung@example.com</x-lf::table.td>
            <x-lf::table.td align="right">Active</x-lf::table.td>
            <x-lf::table.actions>
                <x-lf::btn.default class="px-3 py-1.5">Edit</x-lf::btn.default>
            </x-lf::table.actions>
        </x-lf::table.tr>
    </x-lf::table.tbody>
</x-lf::table>
```

Modal:

```blade
<x-lf::modal wire:model="editing" title="Edit user" size="lg">
    ...
</x-lf::modal>
```

Open or close a modal without Livewire:

```js
window.dispatchEvent(new CustomEvent('open-modal', { detail: 'modal-id' }));
window.dispatchEvent(new CustomEvent('close-modal', { detail: 'modal-id' }));
```

Layout:

```blade
<x-lf::layout title="Admin">
    <x-slot:aside>
        <x-lf::aside>
            <x-lf::aside.item title="Dashboard" icon="home" url="/admin" />
        </x-lf::aside>
    </x-slot:aside>

    <x-lf::navbar title="Dashboard" />
    <main class="p-4">
        ...
    </main>
</x-lf::layout>
```

## Configuration

```php
return [
    'theme' => 'orange',
    'assets' => [
        'use_cdn_icons' => true,
    ],
];
```

Set `assets.use_cdn_icons` to `false` when your app bundles `@tabler/icons-webfont` itself.

Package Livewire components can be registered as alias => class pairs:

```php
'livewire' => [
    'components' => [
        'lf-user-form' => \Hungnm28\LivewireForm\Livewire\UserForm::class,
    ],
],
```

## Backwards Compatibility

The old typo components still exist:

- `<x-lf::form.toogle />`
- `<x-lf::theme.toogle />`

Prefer the corrected aliases:

- `<x-lf::form.toggle />`
- `<x-lf::theme.toggle />`

## Testing

```bash
composer install
composer test
```
