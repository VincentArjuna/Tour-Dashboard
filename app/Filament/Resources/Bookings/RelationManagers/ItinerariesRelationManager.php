<?php

namespace App\Filament\Resources\Bookings\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItinerariesRelationManager extends RelationManager
{
    protected static string $relationship = 'itineraries';

    protected static ?string $recordTitleAttribute = 'title';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
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
                    ->limit(40),

                TextColumn::make('location')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('description')
                    ->limit(60)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('time_of_day')
                    ->options([
                        'morning' => 'Morning',
                        'afternoon' => 'Afternoon',
                        'evening' => 'Evening',
                        'full_day' => 'Full Day',
                    ]),
            ])
            ->headerActions([
                // View-only, no create action
            ])
            ->actions([
                ViewAction::make(),
            ])
            ->bulkActions([
                // View-only, no bulk actions
            ])
            ->modifyQueryUsing(function ($query) {
                return $query->orderBy('day_number', 'asc')
                    ->orderByRaw("CASE 
                               WHEN time_of_day = 'morning' THEN 1
                               WHEN time_of_day = 'afternoon' THEN 2
                               WHEN time_of_day = 'evening' THEN 3
                               WHEN time_of_day = 'full_day' THEN 4
                               ELSE 5
                           END");
            });
    }
}
