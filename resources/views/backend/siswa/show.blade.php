@extends('adminlte::page')

@section('title', 'Profil Siswa')

@section('content_header')
    <h1>Profil Siswa : {{ $siswa->nama }}</h1>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/selectize/dist/css/selectize.css') }}">
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">

            @include('backend.partials.success_message')

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Profil Siswa</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Kelas</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="pull-right">
                            <a href="{{ route('backend.laporan.siswa', $siswa->id) }}" class="btn btn-success">
                                Print
                            </a>
                            <a href="{{ route('backend.siswa.edit', $siswa->id) }}" class="btn btn-primary">Perbarui</a>
                            <a href="#" data-toggle="modal" class="btn btn-danger" data-target="#deleteModal">Hapus</a>
                        </div>
                        <table>
                            <tr>
                                <td width="150px" height="40px">NIS</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->NIS }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Nama</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->nama }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Jenis kelamin</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->sex }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Agama</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->agama }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Tanggal pendidikan</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->tgl_pend->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Tanggal lahir</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->tgl_lahir->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Tempat lahir</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->tmp_lahir }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Alamat</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->alamat }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Kode POS</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->kode_pos }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Golongan darah</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->gol_darah }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Nama ayah</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Pekerjaan ayah</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->pek_ayah }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Pekerjaan ibu</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->pek_ibu }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Nama wali</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->nama_wali }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">No HP wali</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->no_hp_wali }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Keterangan</td>
                                <td width="20px">:</td>
                                <td>{{ $siswa->ket }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <div class="pull-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#kelasModal">
                                Tambah Kelas
                            </button>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Jurusan</th>
                            </thead>
                            <tbody>
                                @if (count($siswa->detailKelas) > 0)
                                    @foreach ($siswa->detailKelas as $v)
                                        <tr>
                                            <td>
                                                <a href="{{ route('backend.kelas.show', $v->id) }}">{{ $v->nama.' ('.$v->tahun_ajaran.')' }}</a>
                                            </td>
                                            <td>
                                                {{ $v->wali }}
                                            </td>
                                            <td>
                                                {{ $v->jurusan_kelas }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" role="modal" id="kelasModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">
                                Tambah Kelas
                            </h4>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="{{ route('backend.siswa.add_kelas') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="siswa" value="{{ $siswa->id }}">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas">
                                        @foreach($kelas as $v)
                                            <option value="{{ $v->id }}">{{ $v->nama.' ('.$v->tahun_ajaran.')' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="pull-right clearfix">
                                    <input type="submit" value="Tambahkan" class="btn btn-primary">
                                </div>
                            </form>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade modal-danger" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button data-dismiss="modal" aria-label="Close" class="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4>Hapus Data</h4>
                        </div>
                        <div class="modal-body">
                            Apa anda yakin ?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('backend.siswa.destroy', $siswa->id) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Hapus" >
                                <input type="button" class="btn btn-default" value="Tutup" data-dismiss="modal">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('vendor/sifter/sifter.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/microplugin/src/microplugin.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/selectize/dist/js/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#kelas').selectize();
        });
    </script>
@endsection
