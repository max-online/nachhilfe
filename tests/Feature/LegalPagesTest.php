<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_impressum_page_is_reachable(): void
    {
        $this->get(route('impressum'))
            ->assertOk()
            ->assertSee('<title>Impressum – Lehrerkreis Wuppertal</title>', false)
            ->assertSee('Handelsregister: 00408836')
            ->assertSee('info@lehrerkreis-wuppertal.de');
    }

    public function test_datenschutz_page_is_reachable(): void
    {
        $this->get(route('datenschutz'))
            ->assertOk()
            ->assertSee('<title>Datenschutz – Lehrerkreis Wuppertal</title>', false)
            ->assertSee('Galaxy GmbH');
    }

    public function test_footer_links_to_the_legal_pages(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('impressum'))
            ->assertSee(route('datenschutz'));
    }

    public function test_pages_load_no_external_fonts(): void
    {
        foreach (['home', 'impressum', 'datenschutz'] as $routeName) {
            $this->get(route($routeName))
                ->assertOk()
                ->assertDontSee('fonts.googleapis.com')
                ->assertSee(asset('fonts/Satoshi-Variable.woff2'));
        }
    }
}
