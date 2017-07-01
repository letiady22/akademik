@extends('adminlte::page')

@section('title', 'Perbarui Profil Siswa')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/selectize/dist/css/selectize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-datepicker/css/datepicker3.css') }}">
@endsection

@section('content_header')
    <h1>Perbarui Profil Siswa</h1>
@stop

@section('content')
    <div class="box box-default color-palette-box" id="daftar-siswa">
        <div class="box-body">

            @include('backend.partials.validation-errors')

            <form action="{{ route('backend.siswa.update', $siswa->id) }}" method="POST">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="NIS">No Induk Siswa</label>
                            <input type="text" name="NIS" class="form-control" id="NIS" value="{{ $siswa->NIS }}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $siswa->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pendidikan">Tanggal Pendidikan</label>
                            <input type="text" name="tanggal_pendidikan" class="form-control" id="tanggal_pendidikan" value="{{ $siswa->tgl_pend->format('Y-m-d') }}">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin">
                                <option value="Laki-laki" {{ $siswa->sex == 'Laki-laki' ? 'selected' : null }}>Laki-laki</option>
                                <option value="Perempuan" {{ $siswa->sex == 'Perempuan' ? 'selected' : null }}>Perempuan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama">
                                <option value="Islam" {{ $siswa->agama == 'Islam' ? 'selected' : null }}>Islam</option>
                                <option value="Kristen" {{ $siswa->agama == 'Kristen' ? 'selected' : null }}>Kristen</option>
                                <option value="Khatolik" {{ $siswa->agama == 'Khatolik' ? 'selected' : null }}>Khatolik</option>
                                <option value="Hindu" {{ $siswa->agama == 'Hindu' ? 'selected' : null }}>Hindu</option>
                                <option value="Budha" {{ $siswa->agama == 'Budha' ? 'selected' : null }}>Budha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $siswa->tgl_lahir->format('Y-m-d') }}">
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ $siswa->tmp_lahir }}">
                        </div>

                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <select name="golongan_darah" id="golongan_darah">
                                @if ($siswa->gol_darah == '')
                                    <option></option>
                                @endif
                                <option value="A" {{ $siswa->gol_darah == 'A' ? 'selected' : null }}>A</option>
                                <option value="B" {{ $siswa->gol_darah == 'B' ? 'selected' : null }}>B</option>
                                <option value="C" {{ $siswa->gol_darah == 'C' ? 'selected' : null }}>C</option>
                                <option value="O" {{ $siswa->gol_darah == 'O' ? 'selected' : null }}>O</option>
                                <option value="AB" {{ $siswa->gol_darah == 'AB' ? 'selected' : null }}>AB</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat">{{ $siswa->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" id="kode_pos" value="{{ $siswa->kode_pos }}">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $siswa->no_hp }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $siswa->nama_ayah }}">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ $siswa->pek_ayah }}">
                        </div>

                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $siswa->nama_ibu }}">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ $siswa->pek_ibu }}">
                        </div>

                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="{{ $siswa->nama_wali }}">
                        </div>

                        <div class="form-group">
                            <label for="no_hp_wali">No HP Wali</label>
                            <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali" value="{{ $siswa->no_hp_wali }}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan">{{ $siswa->ket }}</textarea>
                        </div>
                    </div>
                </div>


                <div class="pull-right">
                    <input type="submit" value="Perbarui" class="btn btn-primary btn-lg">
                </div>

            </form>

        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript" src="{{ url('vendor/sifter/sifter.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/microplugin/src/microplugin.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/selectize/dist/js/selectize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
     <script type="text/javascript" src="{{ asset('vendor/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('#tanggal_lahir').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                todayBtn: false
            });

            $('#tanggal_pendidikan').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                todayBtn: false
            });

            $('#golongan_darah').selectize();
            $('#agama').selectize();
            $('#jenis_kelamin').selectize();
        });
    </script>

@endsection
