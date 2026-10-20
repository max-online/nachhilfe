<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->json('content');
            $table->timestamps();
        });

        DB::table('pages')->insert([
            'slug' => 'home',
            'title' => 'Startseite',
            'content' => json_encode($this->homeContent(), JSON_UNESCAPED_UNICODE),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }

    /**
     * The initial content of the homepage.
     *
     * @return array<string, array<string, mixed>>
     */
    private function homeContent(): array
    {
        return [
            'hero' => [
                'eyebrow' => 'Pädagogische Lernhilfe · seit 1990',
                'title' => 'Besser lernen. Mit Erfahrung seit 1990.',
                'text' => 'Schulbegleitende Nachhilfe in Wuppertal – in kleinen Gruppen oder einzeln, mit erfahrenen Lehrkräften, die nicht nur Lücken schließen, sondern Lernen lehren.',
                'cta' => 'Kostenlose Beratung anfragen',
                'badge_value' => 'max. 4',
                'badge_text' => "Schüler pro Gruppe,\nein Fach pro Gruppe",
            ],
            'offer' => [
                'eyebrow' => 'Unser Angebot',
                'title' => 'Nachhilfe in allen Hauptfächern.',
                'text' => 'Wir begleiten Schülerinnen und Schüler von der Grundschule bis zum Abitur – gezielt dort, wo es gerade hakt.',
                'subjects' => ['Mathematik', 'Deutsch', 'Englisch', 'Französisch', 'Latein', 'Spanisch'],
                'skills_title' => 'Wir trainieren',
                'skills' => [
                    'Sicheres Beherrschen der Rechenarten',
                    'Sichere Rechtschreibung',
                    'Lösung grammatischer Probleme',
                    'Sinnerfassendes Lernen',
                    'Konzentrationstechniken',
                    'Schulung des Hörverständnisses',
                ],
            ],
            'courses' => [
                'eyebrow' => 'Kursmodelle',
                'title' => 'Die passende Form für jedes Kind.',
                'items' => [
                    ['title' => 'Gruppenunterricht', 'text' => 'Homogene Lerngruppen mit maximal 4 Schülern – in jeder Gruppe wird genau ein Fach unterrichtet.', 'dots' => 4],
                    ['title' => 'Zweiergruppe', 'text' => 'Das gewählte Fach wird mit nur zwei Schülern unterrichtet – mehr Zeit für Fragen.', 'dots' => 2],
                    ['title' => 'Einzelunterricht', 'text' => 'Für die sehr gezielte Förderung: volle Aufmerksamkeit für ein Kind.', 'dots' => 1],
                ],
                'specials' => [
                    ['title' => 'Crashkurse', 'text' => 'Gezielte Vorbereitung auf Abitur, Realschulabschluss, ZAP oder Nachprüfung – ohne feste Vertragslaufzeit.'],
                    ['title' => 'Förderunterricht Grundschule', 'text' => 'Frühe, individuelle Unterstützung für Grundschüler – unabhängig von einer Vertragslaufzeit. Fragen Sie gezielt danach.'],
                ],
                'note' => 'Gruppen-, Zweier- und Einzelunterricht werden über Kursform und Fach vertraglich vereinbart; die Mindestlaufzeit beträgt ein halbes Jahr. Alles Weitere besprechen wir gern persönlich.',
            ],
            'approach' => [
                'eyebrow' => 'Unser Ansatz',
                'title' => 'Nicht nur Defizite ausgleichen – Selbsthilfe ermöglichen.',
                'steps' => [
                    ['title' => 'Beratung', 'text' => 'Im persönlichen Gespräch suchen wir nach den Ursachen und der richtigen Lernstrategie.'],
                    ['title' => 'Angebot', 'text' => 'Gemeinsam mit Ihnen legen wir die passende Form des Förderunterrichts fest.'],
                    ['title' => 'Unterricht', 'text' => 'Wir greifen Hausaufgaben und Kernprobleme auf und vermitteln dauerhafte Lerntechniken.'],
                    ['title' => 'Ziel', 'text' => 'Bessere Noten, das Klassenziel – und die Fähigkeit, sich selbst zu helfen.'],
                ],
            ],
            'about' => [
                'highlight' => '1990',
                'text' => 'Seit über 35 Jahren ist der Lehrerkreis in Wuppertal ein verlässlicher Partner für Eltern und Schüler. Unser Team aus qualifizierten Lehrkräften sucht gemeinsam mit Ihnen nach Lösungen.',
                'owner' => 'Inhaber: Marius Beisel',
            ],
            'contact' => [
                'eyebrow' => 'Kontakt',
                'title' => 'Wir beraten Sie gern – persönlich oder am Telefon.',
                'phone' => '0202 – 59 07 55',
                'email' => 'info@lehrerkreis-wuppertal.de',
                'address' => 'Bachstr. 30, 42275 Wuppertal',
            ],
        ];
    }
};
