<?php

Route::get('/', function () {
    $jadwal = collect([
        [
            'hari' => 'Senin',
            'nama' => 'PHP',
            'jam' => '08:30-10:00'
        ],
        [
            'hari' => 'Senin',
            'nama' => 'Java',
            'jam' => '10:00-12:00'
        ],
        [
            'hari' => 'Selasa',
            'nama' => 'Istirahat',
            'jam' => '12:00-13:00'
        ],
        [
            'hari' => 'Selasa',
            'nama' => 'Python',
            'jam' => '08:30-10:00'
        ],
        [
            'hari' => 'Rabu',
            'nama' => 'Javascript',
            'jam' => '10:00-12:00'
        ],
        [
            'hari' => 'Kamis',
            'nama' => 'PHP',
            'jam' => '12:00-13:00'
        ],
    ]);
    $collapsed = $jadwal->collapse();
    $group = $jadwal->groupBy('hari');
    $filtered = $jadwal->filter(function ($v, $k) {
        return $k['hari'] == 'Selasa';
    });
    dd($filtered->all());
});

Route::group(['middleware' => ['web']], function () {
    
    Route::group([
        // 'middleware' => 'auth',
        'namespace' => 'Backend',
        'prefix' => 'backend'
    ], function () {

        Route::resource('guru', 'GuruController');

        Route::resource('pendaftaran', 'PendaftaranController');

        Route::resource('siswa', 'SiswaController');
        Route::post('siswa/add_kelas', [
            'as' => 'backend.siswa.add_kelas',
            'uses' => 'SiswaController@addKelas'
        ]);       

        Route::resource('jadwal', 'JadwalController');

        Route::resource('kelas', 'KelasController');

        Route::resource('matpel', 'MatpelController', [
            'except' => ['show']
        ]);

        
        Route::group(['prefix' => 'laporan'], function() {
            
            
            Route::get('siswa/{id}', 'SiswaController@report');
            Route::get('penerimaan/{id}', 'PendaftaranController@report');
            
        });
        

    });
});
