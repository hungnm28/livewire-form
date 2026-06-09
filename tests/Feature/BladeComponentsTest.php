<?php

namespace Hungnm28\LivewireForm\Tests\Feature;

use Hungnm28\LivewireForm\Tests\TestCase;

class BladeComponentsTest extends TestCase
{
    public function test_it_renders_an_input_component(): void
    {
        $html = (string) $this->blade(
            '<x-lf::form.input name="email" label="Email" placeholder="Email address" />'
        );

        $this->assertStringContainsString('Email', $html);
        $this->assertStringContainsString('name="email"', $html);
        $this->assertStringContainsString('id="email"', $html);
    }

    public function test_it_renders_modal_component(): void
    {
        $html = (string) $this->blade(
            '<x-lf::modal title="Edit user">Content</x-lf::modal>'
        );

        $this->assertStringContainsString('role="dialog"', $html);
        $this->assertStringContainsString('Edit user', $html);
        $this->assertStringContainsString('Content', $html);
    }

    public function test_it_renders_table_component(): void
    {
        $html = (string) $this->blade(<<<'BLADE'
            <x-lf::table title="Users">
                <x-lf::table.thead>
                    <x-lf::table.tr>
                        <x-lf::table.th>Name</x-lf::table.th>
                    </x-lf::table.tr>
                </x-lf::table.thead>
                <x-lf::table.tbody>
                    <x-lf::table.tr>
                        <x-lf::table.td>Hung</x-lf::table.td>
                    </x-lf::table.tr>
                </x-lf::table.tbody>
            </x-lf::table>
        BLADE);

        $this->assertStringContainsString('<table', $html);
        $this->assertStringContainsString('Users', $html);
        $this->assertStringContainsString('Hung', $html);
    }
}
