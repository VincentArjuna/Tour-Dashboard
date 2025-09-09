<?php

namespace App\Filament\Resources\Guides\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class GuidesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('User Account')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('identity_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'passport' => 'success',
                        'national_id' => 'info',
                        'driving_license' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('identity_number')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),

                TextColumn::make('languages')
                    ->badge()
                    ->separator(',')
                    ->wrap()
                    ->toggleable(),

                TextColumn::make('bio')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('identity_type')
                    ->options([
                        'passport' => 'Passport',
                        'national_id' => 'National ID',
                        'driving_license' => 'Driving License',
                    ]),
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
