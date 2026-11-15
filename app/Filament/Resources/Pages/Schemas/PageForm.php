<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Models\Page;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Inhalt')
                    ->visible(fn (?Page $record): bool => $record?->isHomepage() ?? false)
                    ->columnSpanFull()
                    ->persistTabInQueryString()
                    ->tabs([
                        Tab::make('Einstieg')
                            ->schema([
                                TextInput::make('content.hero.eyebrow')
                                    ->label('Überzeile')
                                    ->required(),
                                TextInput::make('content.hero.title')
                                    ->label('Überschrift')
                                    ->required(),
                                Textarea::make('content.hero.text')
                                    ->label('Text')
                                    ->rows(3)
                                    ->required(),
                                TextInput::make('content.hero.cta')
                                    ->label('Button-Text')
                                    ->required(),
                                TextInput::make('content.hero.badge_value')
                                    ->label('Hinweis-Box: Wert')
                                    ->required(),
                                Textarea::make('content.hero.badge_text')
                                    ->label('Hinweis-Box: Text')
                                    ->rows(2)
                                    ->required(),
                            ]),
                        Tab::make('Angebot')
                            ->schema([
                                TextInput::make('content.offer.eyebrow')
                                    ->label('Überzeile')
                                    ->required(),
                                TextInput::make('content.offer.title')
                                    ->label('Überschrift')
                                    ->required(),
                                Textarea::make('content.offer.text')
                                    ->label('Text')
                                    ->rows(3)
                                    ->required(),
                                Repeater::make('content.offer.subjects')
                                    ->label('Fächer')
                                    ->simple(
                                        TextInput::make('subject')->required(),
                                    )
                                    ->reorderable(),
                                TextInput::make('content.offer.skills_title')
                                    ->label('Überschrift der Liste')
                                    ->required(),
                                Repeater::make('content.offer.skills')
                                    ->label('Wir trainieren')
                                    ->simple(
                                        TextInput::make('skill')->required(),
                                    )
                                    ->reorderable(),
                            ]),
                        Tab::make('Kursmodelle')
                            ->schema([
                                TextInput::make('content.courses.eyebrow')
                                    ->label('Überzeile')
                                    ->required(),
                                TextInput::make('content.courses.title')
                                    ->label('Überschrift')
                                    ->required(),
                                Repeater::make('content.courses.items')
                                    ->label('Kurse')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Titel')
                                            ->required(),
                                        Textarea::make('text')
                                            ->label('Text')
                                            ->rows(2)
                                            ->required(),
                                        Select::make('dots')
                                            ->label('Anzahl Punkte (Schüler)')
                                            ->options([1 => '1', 2 => '2', 3 => '3', 4 => '4'])
                                            ->required(),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                    ->collapsible()
                                    ->reorderable(),
                                Repeater::make('content.courses.specials')
                                    ->label('Sonderangebote (dunkle Karten)')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Titel')
                                            ->required(),
                                        Textarea::make('text')
                                            ->label('Text')
                                            ->rows(2)
                                            ->required(),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                    ->collapsible()
                                    ->reorderable(),
                                Textarea::make('content.courses.note')
                                    ->label('Hinweis')
                                    ->rows(3),
                            ]),
                        Tab::make('Ansatz')
                            ->schema([
                                TextInput::make('content.approach.eyebrow')
                                    ->label('Überzeile')
                                    ->required(),
                                TextInput::make('content.approach.title')
                                    ->label('Überschrift')
                                    ->required(),
                                Repeater::make('content.approach.steps')
                                    ->label('Schritte')
                                    ->helperText('Die Farben (gelb, blau, grün, rot) werden der Reihe nach vergeben.')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Titel')
                                            ->required(),
                                        Textarea::make('text')
                                            ->label('Text')
                                            ->rows(2)
                                            ->required(),
                                    ])
                                    ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                                    ->collapsible()
                                    ->reorderable(),
                            ]),
                        Tab::make('Über uns')
                            ->schema([
                                TextInput::make('content.about.eyebrow')
                                    ->label('Überzeile'),
                                TextInput::make('content.about.title')
                                    ->label('Überschrift'),
                                Textarea::make('content.about.text')
                                    ->label('Text')
                                    ->rows(3)
                                    ->required(),
                                TextInput::make('content.about.owner')
                                    ->label('Inhaber-Zeile'),
                            ]),
                        Tab::make('Kontakt')
                            ->schema([
                                TextInput::make('content.contact.eyebrow')
                                    ->label('Überzeile')
                                    ->required(),
                                TextInput::make('content.contact.title')
                                    ->label('Überschrift')
                                    ->required(),
                                TextInput::make('content.contact.phone')
                                    ->label('Telefon')
                                    ->required(),
                                TextInput::make('content.contact.email')
                                    ->label('E-Mail')
                                    ->email()
                                    ->required(),
                                TextInput::make('content.contact.address')
                                    ->label('Adresse')
                                    ->required(),
                            ]),
                    ]),
                TextInput::make('title')
                    ->label('Überschrift')
                    ->required()
                    ->columnSpanFull()
                    ->hidden(fn (?Page $record): bool => $record?->isHomepage() ?? true),
                RichEditor::make('content.body')
                    ->label('Text')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'link'],
                        ['h2', 'h3', 'h4'],
                        ['bulletList', 'orderedList'],
                        ['undo', 'redo'],
                    ])
                    ->hidden(fn (?Page $record): bool => $record?->isHomepage() ?? true),
            ]);
    }
}
