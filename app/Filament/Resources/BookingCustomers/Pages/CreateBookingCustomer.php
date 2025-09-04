<?php

namespace App\Filament\Resources\BookingCustomers\Pages;

use App\Filament\Resources\BookingCustomers\BookingCustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBookingCustomer extends CreateRecord
{
    protected static string $resource = BookingCustomerResource::class;
}
