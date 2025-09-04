<?php

namespace App\Filament\Resources\BookingItineraries\Pages;

use App\Filament\Resources\BookingItineraries\BookingItineraryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBookingItinerary extends EditRecord
{
    protected static string $resource = BookingItineraryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
