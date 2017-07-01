@extends('adminlte::page')

@section('title', 'Daftar Siswa')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/selectize/dist/css/selectize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-datepicker/css/datepicker3.css') }}">
@endsection

@section('content_header')
    <h1>Tambah Profil Siswa</h1>
@stop

@section('content')
    <div class="box box-default color-palette-box" id="daftar-siswa">
        <div class="box-body">

            @include('backend.partials.validation-errors')

            <form action="{{ route('backend.siswa.store') }}" method="POST">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                @if(Request::has('reg_id'))
                    <input type="hidden" name="reg_id" value="{{ Request::get('reg_id') }}">
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="NIS">No Induk Siswa</label>
                            <input type="text" name="NIS" class="form-control" id="NIS" value="{{old('NIS')}}">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $reg ? $reg->nama : old('nama')}}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pendidikan">Tanggal Pendidikan</label>
                            <input type="text" name="tanggal_pendidikan" class="form-control" id="tanggal_pendidikan" value="{{old('tanggal_pendidikan')}}">
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Khatolik">Khatolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{old('tempat_lahir')}}">
                        </div>

                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <select name="golongan_darah" id="golongan_darah">
                                <option></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" id="kode_pos" value="{{old('kode_pos')}}">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{old('no_hp')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{old('nama_ayah')}}">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{old('pekerjaan_ayah')}}">
                        </div>

                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{old('nama_ibu')}}">
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{old('pekerjaan_ibu')}}">
                        </div>

                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="{{old('nama_wali')}}">
                        </div>

                        <div class="form-group">
                            <label for="no_hp_wali">No HP Wali</label>
                            <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali" value="{{old('no_hp_wali')}}">
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                        </div>
                    </div>
                </div>


                <div class="pull-right">
                    <input type="submit" value="Tambahkan" class="btn btn-primary btn-lg">
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
