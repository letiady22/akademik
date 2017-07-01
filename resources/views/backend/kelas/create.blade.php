@extends('adminlte::page')

@section('title', 'Daftar Kelas')

@section('content_header')
    <h1>Daftar Kelas</h1>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/selectize/dist/css/selectize.bootstrap3.css') }}">
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.validation-errors')
            <form action="{{ route('backend.kelas.store') }}" method="POST">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas">
                </div>
                <div class="form-group">
                    <label for="wali_kelas">Wali Kelas</label>
                    <select name="wali_kelas" id="wali_kelas" class="form-control">
                        @foreach($guru as $v)
                            <option value="{{ $v->id }}">{{ $v->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                        @foreach($tahun as $v)
                            <option value="{{ $v->id }}">{{ $v->nama_tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-control">
                        <option value=""></option>
                        @foreach($jurusan as $v)
                            <option value="{{ $v->id }}">{{ $v->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="pull-right">
                    <input type="submit" value="Tambahkan" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script type="text/javascript" src="{{ url('vendor/sifter/sifter.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/microplugin/src/microplugin.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/selectize/dist/js/selectize.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('#wali_kelas').selectize();
            $('#tahun_ajaran').selectize();
            $('#jurusan').selectize();
        });
    </script>
    {!! JsValidator::formRequest(Letiady\Http\Requests\KelasFormRequest::class) !!}
@endsection
