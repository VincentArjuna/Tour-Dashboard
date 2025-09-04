<?php

namespace App\Filament\Resources\BookingItineraries\Pages;

use App\Filament\Resources\BookingItineraries\BookingItineraryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBookingItineraries extends ListRecords
{
    protected static string $resource = BookingItineraryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
