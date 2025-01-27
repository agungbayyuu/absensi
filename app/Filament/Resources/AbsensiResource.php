<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Absensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AbsensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AbsensiResource\RelationManagers;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        DatePicker::make('tanggal'),
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
                            ->reactive() // Menjadikan field ini reaktif
                            ->afterStateUpdated(fn (callable $set) => $set('Nama Siswa', null)),
                            
                        Select::make('nisn') // Menggunakan 'nisn' sebagai nama field
                            ->label('Nama Siswa') // Label untuk tampilan
                            ->options(function (callable $get) {
                                $kelas = $get('kelas'); // Mengambil nilai kelas
                                if (!$kelas) {
                                    return []; // Jika kelas belum dipilih, tidak ada opsi
                                }

                                // Mengambil nama siswa berdasarkan kelas yang dipilih
                                return \App\Models\Siswa::where('kelas', $kelas)
                                    ->pluck('nama_siswa', 'nisn') // Menggunakan nisn sebagai key dan nama_siswa sebagai label
                                    ->toArray();
                            })
                            ->placeholder('Pilih Kelas terlebih dahulu')
                            ->reactive() // Agar input ini terupdate jika opsi kelas diubah
                            ->searchable()
                            ->required(), // Pastikan input wajib diisi

                            
                        Select::make('status')
                            ->options([
                                'Sakit' => 'Sakit',
                                'Alpha' => 'Alpha',
                                'Izin' => 'Izin',
                                'Dispensasi' => 'Dispensasi',
                            ]),
                        // TextInput::make('alasan'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal'),
                TextColumn::make('siswa.nama_siswa'), // Menampilkan nama siswa dari relasi
                TextColumn::make('siswa.kelas')->label('Kelas'), // Menampilkan kelas dari relasi
                TextColumn::make('status'),
                // TextColumn::make('alasan'),
                TextColumn::make('tanggal'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
