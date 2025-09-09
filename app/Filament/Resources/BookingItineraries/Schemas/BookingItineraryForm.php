<?php

namespace App\Filament\Resources\BookingItineraries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingItineraryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Booking Information')
                    ->schema([
                        Select::make('booking_id')
                            ->label('Booking')
                            ->relationship('booking', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => "Booking #{$record->id} - {$record->user->name} ({$record->start_date})")
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),

                Section::make('Itinerary Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('day_number')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->maxValue(30)
                            ->helperText('Which day of the tour is this?'),

                        Select::make('time_of_day')
                            ->options([
                                'morning' => 'Morning',
                                'afternoon' => 'Afternoon',
                                'evening' => 'Evening',
                                'full_day' => 'Full Day',
                            ])
                            ->required(),

                        TextInput::make('location')
                            ->maxLength(255)
                            ->helperText('Location or venue for this activity'),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull()
                            ->helperText('Detailed description of the activity'),
                    ])
                    ->columns(2),
            ]);
    }
}
