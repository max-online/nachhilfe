<?php

namespace Tests\Feature;

use App\Filament\Resources\Inquiries\InquiryResource;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_shows_the_contact_form(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Beratung anfragen')
            ->assertSee(route('inquiries.store'));
    }

    public function test_an_inquiry_can_be_submitted(): void
    {
        $this->post(route('inquiries.store'), [
            'name' => 'Erika Mustermann',
            'email' => 'erika@example.com',
            'phone' => '0202 123456',
            'subject' => 'Mathematik',
            'grade' => '8',
            'message' => 'Mein Sohn braucht Hilfe in Mathe.',
        ])
            ->assertRedirect(route('home').'#kontakt')
            ->assertSessionHas('inquiry_sent', true);

        $this->assertDatabaseHas('inquiries', [
            'email' => 'erika@example.com',
            'subject' => 'Mathematik',
        ]);

        $this->followingRedirects()->get(route('home'))->assertSee('Vielen Dank!');
    }

    public function test_an_inquiry_requires_name_email_and_a_known_subject(): void
    {
        $this->post(route('inquiries.store'), [
            'subject' => 'Klingonisch',
        ])->assertSessionHasErrors(['name', 'email', 'subject']);

        $this->assertSame(0, Inquiry::count());
    }

    public function test_inquiries_are_listed_in_the_admin_panel(): void
    {
        $inquiry = Inquiry::factory()->create();

        $this->actingAs(User::factory()->create())
            ->get(InquiryResource::getUrl('index'))
            ->assertOk()
            ->assertSee($inquiry->email);

        $this->get(InquiryResource::getUrl('view', ['record' => $inquiry]))
            ->assertOk()
            ->assertSee($inquiry->name);
    }
}
