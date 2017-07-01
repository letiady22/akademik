@extends('adminlte::page')

@section('title', 'Perbarui Data Pendaftaran')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('vendor/selectize/dist/css/selectize.css') }}">
@endsection

@section('content_header')
    <h1>Perbarui Data Pendaftaran</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">

            @include('backend.partials.validation-errors')

            <form action="{{ route('backend.pendaftaran.update', $reg->id) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="no_reg">No Registrasi</label>
                    <input type="text" name="no_reg" class="form-control" id="no_reg" value="{{ $reg->no_reg }}">
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $reg->nama }}">
                </div>

                <div class="form-group">
                    <label for="tahun_ajar">Tahun Ajar</label>
                    <select name="tahun_ajar" id="tahun_ajar">
                        @foreach($tahunAjar as $tahun)
                            <option value="{{ $tahun->id }}" {{ $reg->id_tahun === $tahun->id ? 'selected' : null }}>{{ $tahun->nama_tahun }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" value="{{ $reg->asal_sekolah }}">
                </div>

                <div class="form-group">
                    <label for="no_ijazah">No Ijazah</label>
                    <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" value="{{ $reg->no_ijazah }}">
                </div>

                <div class="form-group">
                    <label for="alamat_sekolah">Alamat Asal Sekolah</label>
                    <textarea name="alamat_sekolah" class="form-control" id="alamat_sekolah">{{ $reg->alamat_sekolah }}</textarea>
                </div>

                <div class="form-group">
                    <label for="nilai_un">Nilai UN</label>
                    <input type="text" name="nilai_un" class="form-control" id="nilai_un" value="{{ $reg->nilai_un }}">
                </div>

                <div class="form-group">
                    <label for="tahun_lulus">Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" class="form-control" id="tahun_lulus" value="{{ $reg->tahun_lulus }}">
                </div>

                <div class="form-group">
                    <label for="nem">Nem</label>
                    <input type="text" name="nem" class="form-control" id="nem" value="{{ $reg->nem }}">
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-primary btn-lg" value="Perbarui">
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
    <script type="text/javascript">
        $(function() {
            $('#tahun_ajar').selectize();
        });
    </script>
    {!! JsValidator::formRequest(Letiady\Http\Requests\PendaftaranFormRequest::class) !!}
@endsection
