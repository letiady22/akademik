@extends('adminlte::page')

@section('title', 'Tambah Mata Pelajaran')

@section('content_header')
    <h1>Tambah Mata Pelajaran</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.validation-errors')
            <form action="{{ route('backend.matpel.store') }}" method="POST">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran">
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
    {!! JsValidator::formRequest(Letiady\Http\Requests\MatpelFormRequest::class) !!}
@endsection
