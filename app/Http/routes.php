<?php

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');

Route::group(['middleware' => ['web']], function () {
    
    Route::group([
        'middleware' => 'auth',
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
            
            
            Route::get('siswa/{id}', [
                'uses' => 'SiswaController@report',
                'as' => 'backend.laporan.siswa'
            ]);
            Route::get('penerimaan/{id}', [
                'uses' => 'PendaftaranController@report',
                'as' => 'backend.laporan.pendaftaran'
            ]);
            
        });
        

    });
});
