<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama',
        'pktgol_id',
        'jabatan_id',
        'tgl_lahir',
        'tgl_masuk'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function pktgol()
    {
        return $this->belongsTo(PktGol::class);
    }
}
