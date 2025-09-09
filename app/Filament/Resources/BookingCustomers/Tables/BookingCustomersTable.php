<?php

namespace App\Filament\Resources\BookingCustomers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class BookingCustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('booking.id')
                    ->label('Booking #')
                    ->sortable()
                    ->url(fn ($record) => route('filament.admin.resources.bookings.edit', $record->booking)),

                TextColumn::make('booking.user.name')
                    ->label('Booking User')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer.full_name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer.email')
                    ->label('Customer Email')
                    ->searchable(),

                IconColumn::make('is_primary')
                    ->boolean()
                    ->label('Primary')
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-user')
                    ->trueColor('warning')
                    ->falseColor('gray'),

                TextColumn::make('booking.start_date')
                    ->label('Tour Date')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('is_primary')
                    ->query(fn ($query) => $query->where('is_primary', true))
                    ->label('Primary Customers Only'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
