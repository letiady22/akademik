<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjar extends Model
{

    use SoftDeletes;

    protected $table = 'tahun_ajar';

    protected $fillable = ['nama_tahun', 'tahun_ajar'];

    protected $dates = ['deleted_at'];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_tahun');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_tahun');
    }

    public function siswa()
    {
        return $this->hasMany(DetailSiswa::class, 'id_tahun');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_tahun');
    }

}
