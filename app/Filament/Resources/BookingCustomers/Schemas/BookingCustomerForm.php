<?php

namespace App\Filament\Resources\BookingCustomers\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class BookingCustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('booking_id')
                    ->label('Booking')
                    ->relationship('booking', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => "Booking #{$record->id} - {$record->user->name} ({$record->start_date})")
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'full_name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Checkbox::make('is_primary')
                    ->label('Primary Customer')
                    ->helperText('Mark this customer as the primary contact for the booking'),
            ]);
    }
}
