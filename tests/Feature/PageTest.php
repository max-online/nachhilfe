<?php

namespace Tests\Feature;

use App\Filament\Resources\Pages\PageResource;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Models\Page;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_content_from_the_database(): void
    {
        $page = Page::findBySlug('home');
        $content = $page->content;
        $content['hero']['title'] = 'Neue Überschrift für die Startseite';
        $content['contact']['phone'] = '0202 – 12 34 56';
        $page->update(['content' => $content]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Neue Überschrift für die Startseite')
            ->assertSee('tel:+4920212345', false);
    }

    public function test_pages_are_listed_in_the_admin_panel(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(PageResource::getUrl('index'))
            ->assertOk()
            ->assertSee('Startseite');
    }

    public function test_homepage_content_can_be_edited_in_the_admin_panel(): void
    {
        $page = Page::findBySlug('home');

        $this->actingAs(User::factory()->create());

        Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])
            ->assertOk()
            ->assertSchemaStateSet(['content.hero.title' => 'Besser lernen. Mit Erfahrung seit 1990.'])
            ->fillForm(['content.hero.title' => 'Lernen mit Freude.'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Lernen mit Freude.', $page->refresh()->content['hero']['title']);
        $this->assertSame('Konzentrationstechniken', $page->content['offer']['skills'][4]);

        $this->get(route('home'))->assertSee('Lernen mit Freude.');
    }

    public function test_a_page_cannot_be_saved_without_required_content(): void
    {
        $page = Page::findBySlug('home');

        $this->actingAs(User::factory()->create());

        Livewire::test(EditPage::class, ['record' => $page->getRouteKey()])
            ->fillForm(['content.hero.title' => ''])
            ->call('save')
            ->assertHasFormErrors(['content.hero.title' => 'required']);
    }
}
