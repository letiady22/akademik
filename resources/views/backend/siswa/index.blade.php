
@extends('adminlte::page')

@section('title', 'Daftar Siswa')

@section('content_header')
    <h1>Daftar Siswa</h1>
@stop

@section('content')
    <div class="box box-default color-palette-box" id="daftar-siswa">
        <div class="box-body">
        	@include('backend.partials.success_message')
            <div class="container-fluid">
                <div class="pull-right">
                    <form action="{{ route('backend.siswa.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" value="{{ Request::get('search') }}" class="form-control">
                            <div class="input-group-btn">
                                <input type="submit" value="Search" class="btn btn-default">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $sis)
                            <tr>
                                <td>{{ $sis->NIS }}</td>
                                <td>{{ $sis->nama }}</td>
                                <td>{{ $sis->tgl_lahir->format('d M Y') }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('backend.siswa.show', $sis->id) }}">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $siswa->appends(['search' => Request::get('search')])->links() !!}
            </div>
        </div>
    </div>
@endsection
