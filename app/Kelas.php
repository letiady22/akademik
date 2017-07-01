<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{

    use SoftDeletes;

    protected $table = 'kelas';

    protected $fillable = [
        'nama'
    ];

    protected $appends = ['wali', 'jurusan_kelas', 'tahun_ajaran'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'id_tahun');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function siswa()
    {
        return $this->belongsToMany(DetailSiswa::class,
            'detail_kelas', 'id_kelas', 'id_siswa'
        );
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_kelas');
    }

    public function getWaliAttribute()
    {
        if (count($this->guru) > 0) return $this->guru->nama;
        return '-';
    }

    public function getJurusanKelasAttribute()
    {
        if (count($this->jurusan) > 0) return $this->jurusan->nama;
        return '-';
    }

    public function getTahunAjaranAttribute()
    {
        if (count($this->tahunAjar) > 0) return $this->tahunAjar->nama_tahun;
        return '-';
    }

}
