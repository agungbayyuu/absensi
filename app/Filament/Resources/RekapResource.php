<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Rekap;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RekapResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RekapResource\RelationManagers;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use App\Filament\Resources\RekapResource\RelationManagers\AbsensiRelationManager;

class RekapResource extends Resource
{
    protected static ?string $model = Rekap::class;

    public ModelName $record;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama_siswa')
                ->label('Nama Siswa')
                ->sortable()
                ->searchable(),

            TextColumn::make('kelas')
                ->label('Kelas')
                ->sortable()
                ->searchable(),

            TextColumn::make('sakit_count')
                ->label('Total Sakit')
                ->sortable()
                ->default(0), // Nilai default jika NULL

            TextColumn::make('izin_count')
                ->label('Total Izin')
                ->sortable()
                ->default(0), // Nilai default jika NULL

            TextColumn::make('alpha_count')
                ->label('Total Alpha')
                ->sortable()
                ->default(0), // Nilai default jika NULL
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
            // Tables\Actions\EditAction::make(),
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
            AbsensiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekaps::route('/'),
            'create' => Pages\CreateRekap::route('/create'),
            'edit' => Pages\EditRekap::route('/{record}/edit'),
        ];
    }

    public static function getTableQuery(): Builder
    {
        return parent::getTableQuery();
    }    

}
