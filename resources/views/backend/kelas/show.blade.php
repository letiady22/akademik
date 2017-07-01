@extends('adminlte::page')

@section('title', 'Detail Kelas')

@section('content_header')
    <h1>Detail Kelas : {{ $kelas->nama }}</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Profil</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Jadwal</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table>
                            <tr height="40px">
                                <td width="150px">Nama</td>
                                <td width="20px">:</td>
                                <td>{{ $kelas->nama }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Jurusan</td>
                                <td width="20px">:</td>
                                <td>{{ $kelas->jurusan_kelas }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Wali Kelas</td>
                                <td width="20px">:</td>
                                <td>{{ $kelas->wali }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Tahun Ajaran</td>
                                <td width="20px">:</td>
                                <td>{{ $kelas->tahun_ajaran }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Jumlah Siswa</td>
                                <td width="20px">:</td>
                                <td>{{ count($kelas->siswa) }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Siswa Laki-laki</td>
                                <td width="20px">:</td>
                                <td>{{ count($kelas->siswa) == 0 ? 0 : $kelas->siswa->where('sex', 'Laki-laki')->count() }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Siswa Perempuan</td>
                                <td width="20px">:</td>
                                <td>{{ count($kelas->siswa) == 0 ? 0 : $kelas->siswa->where('sex', 'Perempuan')->count() }}</td>
                            </tr>
                            <tr height="40px">
                                <td width="150px">Daftar Siswa</td>
                                <td width="20px">:</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($kelas->siswa) > 0)
                                    @foreach ($kelas->siswa()->orderBy('nama', 'ASC')->get() as $siswa)
                                        <tr>
                                            <td>{{ $siswa->NIS }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->sex }}</td>
                                            <td>
                                                <a href="{{ route('backend.siswa.show', $siswa->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        @if (count($kelas->jadwal) != 0)
                            <div class="row">
                                @foreach ($kelas->jadwal->groupBy('hari')->toArray() as $k => $v)
                                    <div class="col-md-12">
                                        <h3>{{ $k }}</h3>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Jam</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Pengajar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($v as $jadwal)
                                                    <tr>
                                                        <td>
                                                            {{ $jadwal['jam_mulai'].'-'.$jadwal['jam_akhir'] }}
                                                        </td>
                                                        <td>{{ $jadwal['nama_matpel'] }}</td>
                                                        <td>{{ $jadwal['pengajar'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
