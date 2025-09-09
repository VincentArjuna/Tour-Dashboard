<?php

namespace App\Filament\Resources\BookingItineraries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingItinerariesTable
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
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('day_number')
                    ->label('Day')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('time_of_day')
                    ->label('Time')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'morning' => 'success',
                        'afternoon' => 'warning',
                        'evening' => 'danger',
                        'full_day' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('location')
                    ->searchable()
                    ->limit(25)
                    ->toggleable(),

                TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

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
                SelectFilter::make('time_of_day')
                    ->options([
                        'morning' => 'Morning',
                        'afternoon' => 'Afternoon',
                        'evening' => 'Evening',
                        'full_day' => 'Full Day',
                    ]),

                SelectFilter::make('day_number')
                    ->options(array_combine(range(1, 10), range(1, 10)))
                    ->label('Day Number'),
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
