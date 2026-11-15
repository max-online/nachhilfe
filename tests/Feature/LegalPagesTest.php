<?php

namespace Tests\Feature;

use App\Filament\Resources\Pages\Pages\EditPage;
use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
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
            ->assertSee('Registergericht: Amtsgericht Wuppertal');
    }

    public function test_datenschutz_page_is_reachable(): void
    {
        $this->get(route('datenschutz'))
            ->assertOk()
            ->assertSee('<title>Datenschutzerklärung – Lehrerkreis Wuppertal</title>', false)
            ->assertSee('Galaxy GmbH');
    }

    public function test_legal_page_renders_content_from_the_database(): void
    {
        Page::findBySlug('impressum')->update([
            'title' => 'Neues Impressum',
            'content' => ['body' => '<p>Neue Angaben zum Anbieter</p>'],
        ]);

        $this->get(route('impressum'))
            ->assertOk()
            ->assertSee('<h1>Neues Impressum</h1>', false)
            ->assertSee('<p>Neue Angaben zum Anbieter</p>', false)
            ->assertDontSee('Handelsregister: 00408836');
    }

    public function test_legal_page_content_can_be_edited_in_the_admin_panel(): void
    {
        $page = Page::findBySlug('datenschutz');

        $this->actingAs(User::factory()->create());

        Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])
            ->assertOk()
            ->assertFormFieldVisible('content.body')
            ->assertFormFieldHidden('content.hero.title')
            ->fillForm([
                'title' => 'Datenschutzhinweise',
                'content.body' => '<p>Wir speichern nur das Nötigste.</p>',
            ])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Datenschutzhinweise', $page->refresh()->title);

        $this->get(route('datenschutz'))
            ->assertSee('Datenschutzhinweise')
            ->assertSee('Wir speichern nur das Nötigste.');
    }

    public function test_legal_page_cannot_be_saved_without_text(): void
    {
        $page = Page::findBySlug('impressum');

        $this->actingAs(User::factory()->create());

        Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])
            ->fillForm(['content.body' => ''])
            ->call('save')
            ->assertHasFormErrors(['content.body']);
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
