@extends('adminlte::page')

@section('title', 'Daftar Guru')

@section('content_header')
    <h1>Daftar Guru</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.success_message')
            <div class="container-fluid">
                <div class="pull-right">
                    <form action="{{ route('backend.guru.index') }}" method="GET">
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guru as $g)
                            <tr>
                                <td>{{ $g->NIP }}</td>
                                <td>{{ $g->nama }}</td>
                                <td>{{ $g->status_guru }}</td>
                                <td>
                                    <a href="{{ route('backend.guru.show', $g->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $guru->appends(['search'=>Request::get('search')])->links() !!}
            </div>
        </div>
    </div>
@endsection
