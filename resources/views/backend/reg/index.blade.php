@extends('adminlte::page')

@section('title', 'Daftar Pendaftaran')

@section('content_header')
    <h1>Daftar Pendaftaran</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            <div class="container-fluid">
                <div class="pull-right">
                    <form action="{{ route('backend.pendaftaran.index') }}" method="GET">
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
                            <th>No Reg</th>
                            <th>Nama</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($regs as $reg)
                            <tr>
                                <td>{{ $reg->no_reg }}</td>
                                <td>{{ $reg->nama }}</td>
                                <td>{{ $reg->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('backend.pendaftaran.show', $reg->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $regs->appends(['search' => Request::get('search')])->links() !!}
            </div>
        </div>
    </div>
@endsection
