<?php

namespace App\Filament\Resources\BookingCustomers\Pages;

use App\Filament\Resources\BookingCustomers\BookingCustomerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBookingCustomer extends EditRecord
{
    protected static string $resource = BookingCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
