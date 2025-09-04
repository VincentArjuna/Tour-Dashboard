<?php

namespace App\Filament\Resources\Guides\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('identity_type'),
                TextInput::make('identity_number'),
                TextInput::make('name')
                    ->required(),
                DatePicker::make('date_of_birth')
                    ->required(),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('languages'),
            ]);
    }
}
