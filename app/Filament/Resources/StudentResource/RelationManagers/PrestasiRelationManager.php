<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiRelationManager extends RelationManager
{
    protected static string $relationship = 'prestasi';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('prestasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->integer(),
                Textarea::make('keterangan')
                    ->nullable()


            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('prestasi')
            ->columns([
                Tables\Columns\TextColumn::make('prestasi'),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('keterangan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
