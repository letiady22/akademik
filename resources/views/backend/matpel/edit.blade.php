@extends('adminlte::page')

@section('title', 'Edit Mata Pelajaran')

@section('content_header')
    <h1>Edit Mata Pelajaran</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.success_message')
            @include('backend.partials.validation-errors')
            <form action="{{ route('backend.matpel.update', $matpel->id) }}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" value="{{ $matpel->nama }}">
                </div>
                <div class="pull-right">
                    <input type="submit" value="Ubah" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}">
    {!! JsValidator::formRequest(Letiady\Http\Requests\MatpelFormRequest::class) !!}
@endsection
