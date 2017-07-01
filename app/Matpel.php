<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matpel extends Model
{

    use SoftDeletes;

    protected $table = 'matpel';

    protected $fillable = [
        'nama'
    ];

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_matpel', 'id_matpel', 'id_guru');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_matpel');
    }

}
