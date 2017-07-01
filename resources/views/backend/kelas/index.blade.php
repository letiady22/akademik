@extends('adminlte::page')

@section('title', 'Daftar Kelas')

@section('content_header')
    <h1>Daftar Kelas</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.success_message')
            <div class="container-fluid">
                <div class="pull-right">
                    <form action="{{ route('backend.kelas.index') }}" method="GET">
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
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas as $v)
                            <tr>
                                <td>{{ $v->nama }}</td>
                                <td>{{ count($v->guru) > 0 ? $v->guru->nama : '-' }}</td>
                                <td>{{ count($v->tahunAjar) > 0 ? $v->tahunAjar->nama_tahun : '-' }}</td>
                                <td>{{ count($v->jurusan) > 0 ? $v->jurusan->nama : '-' }}</td>
                                <td>
                                    <a href="{{ route('backend.kelas.show', $v->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                    <a href="{{ route('backend.kelas.edit', $v->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $kelas->appends(['search' => Request::get('search')])->links() }}
            </div>
        </div>
    </div>
@endsection
