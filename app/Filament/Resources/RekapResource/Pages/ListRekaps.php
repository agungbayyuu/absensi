<?php

namespace App\Filament\Resources\RekapResource\Pages;

use App\Filament\Resources\RekapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRekaps extends ListRecords
{
    public static string $resource = RekapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'X1' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'X1')),
            'X2' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'X2')),
            'X3' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'X3')),
            'X4' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'X4')),
            'XI1' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'XI1')),
            'XI2' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'XI2')),
            'XI3' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'XI3')),
            'XI4' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('kelas', 'XI4')),
        ];
    }

}
