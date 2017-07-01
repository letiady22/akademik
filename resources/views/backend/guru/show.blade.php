@extends('adminlte::page')

@section('title', 'Detail Guru '.$guru->nama)

@section('content_header')
    <h1>Detail Guru : {{ $guru->nama }}</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="#tab_1" data-toggle="tab" class="active">Profil</a>
                    </li>
                    @if (count($guru->jadwal) > 0)
                        <li>
                            <a href="#tab_2" data-toggle="tab">Jadwal Mengajar</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="pull-right">

                            <a href="{{ route('backend.guru.edit', $guru->id) }}" class="btn btn-primary">Perbarui</a>
                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                            
                        </div>
                        <table>
                            <tr height="40px">
                                <td width="180px">NIP</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->NIP }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Nama</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->nama }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Jenis Kelamin</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->sex }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Tempat dan Tanggal Lahir</td>
                                <td width="20x">:</td>
                                <td>{{ $guru->tmp_lahir }}, {{ $guru->tgl_lahir->format('d M Y') }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Agama</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->agama }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Jabatan</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->jabatan }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Golongan</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->golongan }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Status</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->status }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Kode POS</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->kode_pos }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Alamat</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->alamat }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">No Telepon</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->telepon }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Email</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->email }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Mengajar</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->mengajar }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="180px">Keterangan</td>
                                <td width="20px">:</td>
                                <td>{{ $guru->ket }}</td>
                            </tr>
                        </table>
                    </div>
                    @if (count($guru->jadwal) > 0)
                        <div class="tab-pane" id="tab_2">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Semester</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Ajaran</th>
                                </thead>
                                <tbody>
                                    @foreach ($guru->jadwal()->with(['kelas', 'matpel'])->get() as $jadwal)
                                        <tr>
                                            <td>
                                                {{ $jadwal->hari }}
                                            </td>
                                            <td>
                                                {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_akhir }}
                                            </td>
                                            <td>
                                                {{ $jadwal->semester }}
                                            </td>
                                            <td>
                                                {{ count($jadwal->kelas) == 1 ? $jadwal->kelas->nama : '-' }}
                                            </td>
                                            <td>{{ count($jadwal->kelas) == 1 ? $jadwal->kelas->jurusan_kelas : '-' }}</td>
                                            <td>{{ count($jadwal->kelas) == 1 ? $jadwal->kelas->tahun_ajaran : '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal modal-danger fade" id="deleteModal" role="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4>Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                        <b>Apa anda yakin ?</b>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('backend.guru.destroy', $guru->id) }}" method="POST">

                            <input type="hidden" value="{{ csrf_token() }}" name="_token" >
                            <input type="hidden" value="DELETE" name="_method" >
                            
                            <input type="submit" class="btn btn-danger" value="Hapus" >
                            <input type="button" class="btn btn-default" value="Tutup" data-dismiss="modal">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
