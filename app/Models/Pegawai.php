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
        'tgl_masuk',
        'berkas_skcpns',
        'berkas_skpns',
        'berkas_skpktterakhir',
        'berkas_skjabatan',
        'berkas_kgbterakhir',
        'berkas_karpeg',
        'berkas_drp',
        'berkas_skhukuman',
        'berkas_dsk',
        'berkas_suratnikah',
        'berkas_akteanak',
        'berkas_kpt',
        'berkas_dpcp',
        'berkas_ppk2thnterakhir',
        'berkas_pasphoto'
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
