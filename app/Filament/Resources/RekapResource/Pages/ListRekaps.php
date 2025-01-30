<?php

namespace App\Filament\Resources\RekapResource\Pages;

use App\Filament\Resources\RekapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Actions\Modal\Actions\Action;

class ListRekaps extends ListRecords
{
    use HasPageSidebar;

    public static string $resource = RekapResource::class;

        // Menambahkan filter berdasarkan URL
        protected function getTableQuery(): Builder
        {
            // Ambil parameter 'kelas' dari URL
            $query = parent::getTableQuery();
    
            $kelas = request()->query('kelas'); // Ambil parameter kelas dari URL
            
            if ($kelas) {
                // Jika ada kelas, lakukan filter berdasarkan kelas
                $query->where('kelas', $kelas);
            }
    
            return $query;
        }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\ButtonAction::make('Laporan pdf')->url(fn()=> route('download.tes'))
            ->openUrlInNewTab(),
            
        ];
    }

    protected function getSidebar()
    {
        return static::getResource()::sidebar();
    }

}
