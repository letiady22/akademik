@extends('adminlte::page')

@section('title', 'Detail Pendaftaran')

@section('content_header')
    <h1>Detail Pendaftaran : {{ $reg->nama }}</h1>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-body">

            @include('backend.partials.success_message')

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="#tab_1" data-toggle="tab" class="active">Detail Pendaftaran</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">Profil Siswa</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="pull-right">
                            <a href="{{ route('backend.laporan.penerimaan', $reg->id) }}" class="btn btn-success">
                                Print
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                            <a href="{{ route('backend.pendaftaran.edit', $reg->id) }}" class="btn btn-primary">Perbarui</a>
                        </div>
                        <table>
                            <tr>
                                <td width="150px" height="40px">No registrasi</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->no_reg }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Nama</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->nama }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Asal sekolah</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Alamat asal sekolah</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->alamat_sekolah }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">No ijazah</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->no_ijazah }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Tahun lulus</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->tahun_lulus }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Nem</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->nem }}</td>
                            </tr>
                            <tr>
                                <td width="150px" height="40px">Nilai UN</td>
                                <td width="20px">:</td>
                                <td>{{ $reg->nilai_un }}</td>
                            </tr>
                        </table>

                        <div class="modal fade modal-danger" id="deleteModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" aria-label="Close" class="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4>Hapus Data</h4>
                                    </div>
                                    <div class="modal-body">
                                        Apa anda yakin ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('backend.reg.destroy', $siswa->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Hapus" >
                                            <input type="button" class="btn btn-default" value="Tutup" data-dismiss="modal">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane" id="tab_2">
                        @if (count($reg->detailSiswa) == 0)
                            <div class="text-center">
                                <a href="{{ route('backend.siswa.create', ['reg_id' => $reg->id]) }}" class="btn btn-lg btn-success">
                                    Tambah Profil
                                </a>
                            </div>
                        @else
                            <div class="pull-right">
                                <a href="{{ route('backend.siswa.edit', $reg->detailSiswa->id) }}" class="btn btn-primary">Perbarui</a>
                            </div>
                            <table>
                                <tr>
                                    <td width="150px" height="40px">NIS</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->NIS }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Nama</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Jenis kelamin</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->sex }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Agama</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->agama }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Tanggal pendidikan</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->tgl_pend->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Tanggal lahir</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->tgl_lahir->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Tempat lahir</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->tmp_lahir }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Alamat</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->alamat }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Kode POS</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Golongan darah</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->gol_darah }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Nama ayah</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Pekerjaan ayah</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->pek_ayah }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Pekerjaan ibu</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->pek_ibu }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Nama wali</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->nama_wali }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">No HP wali</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->no_hp_wali }}</td>
                                </tr>
                                <tr>
                                    <td width="150px" height="40px">Keterangan</td>
                                    <td width="20px">:</td>
                                    <td>{{ $reg->detailSiswa->ket }}</td>
                                </tr>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
