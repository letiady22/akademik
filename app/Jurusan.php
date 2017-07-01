<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{

    use SoftDeletes;

    protected $table = 'jurusan';

    protected $fillable = ['nama'];

    protected $dates = ['deleted_at'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_jurusan');
    }

}
