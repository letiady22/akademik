<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class DetailSiswa extends Model
{

    use SoftDeletes;

    protected $table = 'detail_siswa';

    protected $dates = ['tgl_lahir', 'tgl_pend'];

    protected $fillable = [
        'NIS', 'nama', 'tgl_lahir',
        'tmp_lahir', 'alamat', 'no_hp', 'email',
        'sex', 'kode_pos', 'nama_ayah', 'nama_ibu',
        'pek_ayah', 'pek_ibu', 'gol_darah', 'tgl_pend',
        'nama_wali', 'no_hp_wali', 'ket', 'agama', 'tmp_lahir'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'reg_id');
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'id_tahun');
    }

    public function detailKelas()
    {
        return $this->belongsToMany(
            Kelas::class, 'detail_kelas',
            'id_siswa', 'id_kelas'
        );
    }

    public function scopeLaki($query)
    {
        $query->where('sex', 'Laki-laki');
    }

    public function scopePerempuan($query)
    {
        $query->where('sex', 'Perempuan');
    }

    public function scopeAktif($query)
    {
        $query->where('status', 'Aktif');
    }

    public function scopePindah($query)
    {
        $query->where('status', 'Pindah');
    }

    public function scopeKeluar($query)
    {
        $query->where('status', 'Keluar');
    }

    public function scopeDikeluarkan($query)
    {
        $query->where('status', 'Dikeluarkan');
    }

}
