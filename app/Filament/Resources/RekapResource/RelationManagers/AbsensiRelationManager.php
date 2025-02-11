<?php

namespace App\Filament\Resources\RekapResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AbsensiRelationManager extends RelationManager
{
    protected static string $relationship = 'absensi';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_siswa')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nisn')
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama_siswa'),
                Tables\Columns\TextColumn::make('siswa.kelas'),
                Tables\Columns\TextColumn::make('tanggal'),
                Tables\Columns\TextColumn::make('status'),

            ])
            ->filters([
                //
            ])

            ->bulkActions([

            ]);
    }
}
