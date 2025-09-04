<?php

namespace App\Filament\Resources\BookingCustomers;

use App\Filament\Resources\BookingCustomers\Pages\CreateBookingCustomer;
use App\Filament\Resources\BookingCustomers\Pages\EditBookingCustomer;
use App\Filament\Resources\BookingCustomers\Pages\ListBookingCustomers;
use App\Filament\Resources\BookingCustomers\Schemas\BookingCustomerForm;
use App\Filament\Resources\BookingCustomers\Tables\BookingCustomersTable;
use App\Models\BookingCustomer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BookingCustomerResource extends Resource
{
    protected static ?string $model = BookingCustomer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BookingCustomerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookingCustomersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookingCustomers::route('/'),
            'create' => CreateBookingCustomer::route('/create'),
            'edit' => EditBookingCustomer::route('/{record}/edit'),
        ];
    }
}
