<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                DatePicker::make('date_of_birth')
                    ->required()
                    ->native(false)
                    ->maxDate(now()->subYears(5)),

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

                Textarea::make('special_needs')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
