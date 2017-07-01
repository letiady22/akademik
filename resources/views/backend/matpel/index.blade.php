@extends('adminlte::page')

@section('title', 'Daftar Mata Pelajaran')

@section('content_header')
    <h1>Daftar Mata Pelajaran</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            @include('backend.partials.success_message')
            <div class="container-fluid">
                <div class="pull-right">
                    <form action="{{ route('backend.matpel.index') }}" method="GET">
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
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matpel as $v)
                            <tr>
                                <td>{{ $v->nama }}</td>
                                <td>
                                    <a href="{{ route('backend.matpel.edit', $v->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{ $v->id }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $matpel->appends(['search' => Request::get('search')])->links() }}

                <div class="modal fade modal-danger" id="deleteModal" role="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" aria-label="Close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4>Hapus Data</h4>
                            </div>
                            <div class="modal-body">
                                Apa anda yakin ?
                            </div>
                            <div class="modal-footer">
                                <form method="POST" id="formDelete">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger" value="Hapus">
                                    <input type="button" data-dismiss="modal" value="Tutup" class="btn btn-default">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function () {
            $('.btn-delete').click(function () {
                var id = $(this).attr('data-id');
                var form = $('#formDelete');
                form.attr('action', '/backend/matpel/' + id);
            });
        });
    </script>
@endsection
