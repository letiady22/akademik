<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftaran extends Model
{

    use SoftDeletes;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'no_reg', 'nama', 'asal_sekolah',
        'alamat_sekolah', 'tahun_lulus',
        'no_ijazah', 'nem', 'nilai_un'
    ];

    public function detailSiswa()
    {
        return $this->hasOne(DetailSiswa::class, 'reg_id');
    }

    public function tahunAjar()
    {
        return $this->belongsTo(TahunAjar::class, 'id_tahun');
    }

}
