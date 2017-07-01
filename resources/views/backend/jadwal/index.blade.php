@extends('adminlte::page')

@section('title', 'Daftar Jadwal')

@section('content_header')
    <h1>Daftar Jadwal</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.success_message')
            <div class="container-fluid">
                <div class="pull-right">
                    <form action="{{ route('backend.jadwal.index') }}" method="GET">
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
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pelajaran</th>
                            <th>Pengajar</th>
                            <th>Hari</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $v)
                            <tr>
                                <td>{{ count($v->matpel) > 0 ? $v->matpel->nama : '-' }}</td>
                                <td>{{ count($v->guru) > 0 ? $v->guru->nama : '-' }}</td>
                                <td>{{ $v->hari }}</td>
                                <td>{{ count($v->kelas) > 0 ? $v->kelas->nama : '-' }}</td>
                                <td>
                                    <a href="{{ route('backend.jadwal.edit', $v->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $jadwal->appends(['search' => Request::get('search')])->links() }}
            </div>
        </div>
    </div>
@endsection
