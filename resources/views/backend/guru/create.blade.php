@extends('adminlte::page')

@section('title', 'Tambahkan Guru')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/selectize/dist/css/selectize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-datepicker/css/datepicker3.css') }}">
@endsection

@section('content_header')
    <h1>Tambahkan Guru</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">

            <form action="{{ route('backend.guru.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" name="NIP" class="form-control" id="NIP" value="{{ old('NIP') }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap" value="{{ old('nama') }}">
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
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" name="telepon" class="form-control" id="telepon" value="{{ old('telepon') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" class="form-control" id="status" value="{{ old('status') }}">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ old('jabatan') }}">
                </div>
                <div class="form-group">
                    <label for="mata_pelajaran">Mengajar</label>
                    <input type="text" name="mata_pelajaran" class="" id="mata_pelajaran" value="{{ old('mata_pelajaran') }}">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan">{{ old('kererangan') }}</textarea>
                </div>
                <div class="pull-right">
                    <input type="submit" value="Tambahkan" class="btn btn-lg btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendor/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/sifter/sifter.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/microplugin/src/microplugin.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/selectize/dist/js/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {

            $('#tanggal_lahir').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                todayBtn: false
            });
            var matpel = [
                @foreach($matpel as $m)
                    {mata_pelajaran: '{{ $m }}'},
                @endforeach
            ];
            $('#jenis_kelamin').selectize();
            $('#agama').selectize();
            $('#mata_pelajaran').selectize({
                delimiter: ',',
                persist: false,
                valueField: 'mata_pelajaran',
                labelField: 'mata_pelajaran',
                searchField: 'mata_pelajaran',
                options: matpel,
                plugins: ['restore_on_backspace', 'remove_button']
            });

        });
    </script>
    {!! JsValidator::formRequest(Letiady\Http\Requests\GuruFormRequest::class) !!}
@endsection
