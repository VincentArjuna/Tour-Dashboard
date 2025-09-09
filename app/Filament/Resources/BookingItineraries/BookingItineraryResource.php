<?php

namespace App\Filament\Resources\BookingItineraries;

use App\Filament\Resources\BookingItineraries\Pages\CreateBookingItinerary;
use App\Filament\Resources\BookingItineraries\Pages\EditBookingItinerary;
use App\Filament\Resources\BookingItineraries\Pages\ListBookingItineraries;
use App\Filament\Resources\BookingItineraries\Schemas\BookingItineraryForm;
use App\Filament\Resources\BookingItineraries\Tables\BookingItinerariesTable;
use App\Models\BookingItinerary;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BookingItineraryResource extends Resource
{
    protected static ?string $model = BookingItinerary::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'Tour Itineraries';

    protected static ?string $modelLabel = 'Tour Itinerary';

    protected static ?string $pluralModelLabel = 'Tour Itineraries';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 3;

    protected static string|UnitEnum|null $navigationGroup = 'Tour Management';

    public static function form(Schema $schema): Schema
    {
        return BookingItineraryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookingItinerariesTable::configure($table);
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
            'index' => ListBookingItineraries::route('/'),
            'create' => CreateBookingItinerary::route('/create'),
            'edit' => EditBookingItinerary::route('/{record}/edit'),
        ];
    }
}
