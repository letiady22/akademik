@extends('adminlte::page')

@section('title', 'Tambah Jadwal')

@section('content_header')
    <h1>Tambah Jadwal</h1>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/selectize/dist/css/selectize.bootstrap3.css') }}">
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.validation-errors')
            <form action="{{ route('backend.jadwal.store') }}" method="POST">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                    <label for="matpel">Mata Pelajaran</label>
                    <select name="matpel" id="matpel" class="form-control">
                        @foreach($matpel as $v)
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
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                        @foreach($kelas as $v)
                            <option value="{{ $v->id }}">
                                {{ $v->nama }} {{ count($v->tahunAjar) > 0 ? '('.$v->tahunAjar->nama_tahun.')' : '(-)' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select name="hari" id="hari">
                        @foreach($hari as $v)
                            <option value="{{ $v }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jam</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="jam_mulai" id="jam_mulai" class="form-control" placeholder="Jam mulai (00:00)">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="jam_akhir" id="jam_akhir" class="form-control" placeholder="Jam akhir (00:00)">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" name="semester" id="semester">
                </div>
                <div class="form-group">
                    <label for="pengajar">Pengajar</label>
                    <select name="pengajar" id="pengajar" class="form-control">
                        @foreach($guru as $v)
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
            $('#pengajar').selectize();
            $('#tahun_ajaran').selectize();
            $('#matpel').selectize();
            $('#hari').selectize();
            $('#kelas').selectize();
        });
    </script>
    {!! JsValidator::formRequest(Letiady\Http\Requests\JadwalFormRequest::class) !!}
@endsection
