<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'program_studi'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date'
    ];

    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
