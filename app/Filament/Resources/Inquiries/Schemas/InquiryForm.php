<?php

namespace App\Filament\Resources\Inquiries\Schemas;

use App\Models\Inquiry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),
                TextInput::make('email')
                    ->label('E-Mail')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->label('Telefon')
                    ->tel(),
                Select::make('subject')
                    ->label('Fach')
                    ->options(array_combine(Inquiry::SUBJECTS, Inquiry::SUBJECTS))
                    ->required(),
                TextInput::make('grade')
                    ->label('Klasse'),
                Textarea::make('message')
                    ->label('Nachricht')
                    ->columnSpanFull(),
            ]);
    }
}
