<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Name'),
                TextEntry::make('email')
                    ->label('E-Mail')
                    ->url(fn (string $state): string => "mailto:{$state}"),
                TextEntry::make('phone')
                    ->label('Telefon')
                    ->placeholder('-'),
                TextEntry::make('subject')
                    ->label('Fach')
                    ->badge(),
                TextEntry::make('grade')
                    ->label('Klasse')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label('Eingegangen')
                    ->dateTime('d.m.Y H:i'),
                TextEntry::make('message')
                    ->label('Nachricht')
                    ->placeholder('-')
                    ->columnSpanFull(),
            ]);
    }
}
