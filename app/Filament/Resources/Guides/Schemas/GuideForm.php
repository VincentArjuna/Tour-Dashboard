<?php

namespace App\Filament\Resources\Guides\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User Account')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('identity_type')
                    ->options([
                        'passport' => 'Passport',
                        'national_id' => 'National ID',
                        'driving_license' => 'Driving License',
                    ])
                    ->required(),

                TextInput::make('identity_number')
                    ->required()
                    ->maxLength(50),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('date_of_birth')
                    ->required()
                    ->native(false)
                    ->maxDate(now()->subYears(18)),

                Textarea::make('bio')
                    ->rows(4)
                    ->columnSpanFull(),

                TagsInput::make('languages')
                    ->suggestions([
                        'English',
                        'Indonesian',
                        'Mandarin',
                        'Japanese',
                        'Korean',
                        'French',
                        'German',
                        'Spanish',
                        'Italian',
                        'Dutch',
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
