<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{

    use SoftDeletes;

    protected $table = 'jadwal';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'semester', 'jam', 'hari',
        'jam_mulai', 'jam_akhir'
    ];

    protected $appends = ['nama_matpel', 'pengajar'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'id_tahun');
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class, 'id_matpel');
    }

    public function  getNamaMatpelAttribute()
    {
        if (count($this->matpel) > 0)
            return $this->matpel->nama;
        return '-';
    }

    public function  getPengajarAttribute()
    {
        if (count($this->guru) > 0)
            return $this->guru->nama;
        return '-';
    }

}
