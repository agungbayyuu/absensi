<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nisn')->label('NISN'),
                TextInput::make('nama_siswa')->label('Nama Siswa'),
                Radio::make('jenis_kelamin')
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ])
                            ->label('Jenis Kelamin'),
                Select::make('kelas')
                            ->options([
                                'X1' => 'X1',
                                'X2' => 'X2',
                                'X3' => 'X3',
                                'X4' => 'X4',
                                'XI1' => 'XI1',
                                'XI2' => 'XI2',
                                'XI3' => 'XI3',
                                'XI4' => 'XI4',
                                'XII1' => 'XII1',
                                'XII2' => 'XII2',
                                'XII3' => 'XII3',
                                'XII4' => 'XII4',
                            ])
                            ->label('Kelas'),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nisn')->label('NISN'),
                TextColumn::make('nama_siswa')->label('Nama Siswa'),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                TextColumn::make('kelas')->label('Kelas'),
            ])
            ->filters([
                SelectFilter::make('Kelas')
                    ->options([
                                'X1' => 'X1',
                                'X2' => 'X2',
                                'X3' => 'X3',
                                'X4' => 'X4',
                                'XI1' => 'XI1',
                                'XI2' => 'XI2',
                                'XI3' => 'XI3',
                                'XI4' => 'XI4',
                                'XII1' => 'XII1',
                                'XII2' => 'XII2',
                                'XII3' => 'XII3',
                                'XII4' => 'XII4',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
