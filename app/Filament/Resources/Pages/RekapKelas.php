<?php

namespace App\Filament\Resources\RekapResource\Pages;

use App\Filament\Resources\RekapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class RekapKelas extends ListRecords
{
    
    protected static string $resource = RekapResource::class;

    protected static ?string $navigationLabel = 'heroicon-o-rectangle-stack';
}
