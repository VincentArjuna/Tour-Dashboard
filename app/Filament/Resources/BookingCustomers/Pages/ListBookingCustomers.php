<?php

namespace App\Filament\Resources\BookingCustomers\Pages;

use App\Filament\Resources\BookingCustomers\BookingCustomerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBookingCustomers extends ListRecords
{
    protected static string $resource = BookingCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
