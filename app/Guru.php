<?php

namespace Letiady;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    protected $table = 'guru';

    protected $dates = ['tgl_lahir'];

    protected $appends = ['mengajar'];

    protected $fillable = [
        'NIP', 'nama', 'alamat',
        'telepon', 'sex', 'tmp_lahir',
        'tgl_lahir', 'jabatan', 'golongan',
        'status_guru', 'ket', 'kode_pos', 'agama',
        'email'
    ];

    public function matpel()
    {
        return $this->belongsToMany(Matpel::class, 'guru_matpel', 'id_guru', 'id_matpel');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id_guru');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_guru');
    }

    public function getMengajarAttribute()
    {
        if (count($this->matpel) > 0) {
            return implode(',', $this->matpel()->lists('nama')->toArray());
        }
        return null;
    }

    public function syncMatpel($data)
    {
        $data = explode(',', $data);
        $m = [];
        foreach ($data as $value) {
            $matpel = Matpel::where('nama', $value)->first();
            $m [] = $matpel->id;
        }
        return $this->matpel()->sync($m);
    }

}
