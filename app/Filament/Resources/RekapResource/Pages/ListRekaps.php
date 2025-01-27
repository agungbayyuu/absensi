<?php

namespace App\Filament\Resources\RekapResource\Pages;

use App\Filament\Resources\RekapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekaps extends ListRecords
{
    protected static string $resource = RekapResource::class;

    protected static ?string $model = Rekap::class;

    public ModelName $record;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Tes';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
