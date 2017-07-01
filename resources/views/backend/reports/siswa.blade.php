<html>
<head>
    <title>Laporan {{ $siswa->nama }}</title>
</head>
<body>
<div class="title" style="text-align: center;">
    <h3>Pemerintah Kabupaten Ciamis</h3>
    <h3>Dinas Pendidikan</h3>
    <h3>SMA NEGERI 1 SINDANGKASIH</h3>
</div>
<hr>
<h4>Profil Siswa</h4>
<table>
    <tr>
        <td width="150px" height="40px">NIS</td>
        <td width="20px">:</td>
        <td>{{ $siswa->NIS }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Nama</td>
        <td width="20px">:</td>
        <td>{{ $siswa->nama }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Jenis kelamin</td>
        <td width="20px">:</td>
        <td>{{ $siswa->sex }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Agama</td>
        <td width="20px">:</td>
        <td>{{ $siswa->agama }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Tanggal pendidikan</td>
        <td width="20px">:</td>
        <td>{{ $siswa->tgl_pend->format('d M Y') }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Tanggal lahir</td>
        <td width="20px">:</td>
        <td>{{ $siswa->tgl_lahir->format('d M Y') }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Tempat lahir</td>
        <td width="20px">:</td>
        <td>{{ $siswa->tmp_lahir }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Alamat</td>
        <td width="20px">:</td>
        <td>{{ $siswa->alamat }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Kode POS</td>
        <td width="20px">:</td>
        <td>{{ $siswa->kode_pos }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Golongan darah</td>
        <td width="20px">:</td>
        <td>{{ $siswa->gol_darah }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Nama ayah</td>
        <td width="20px">:</td>
        <td>{{ $siswa->nama_ayah }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Pekerjaan ayah</td>
        <td width="20px">:</td>
        <td>{{ $siswa->pek_ayah }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Pekerjaan ibu</td>
        <td width="20px">:</td>
        <td>{{ $siswa->pek_ibu }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Nama wali</td>
        <td width="20px">:</td>
        <td>{{ $siswa->nama_wali }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">No HP wali</td>
        <td width="20px">:</td>
        <td>{{ $siswa->no_hp_wali }}</td>
    </tr>
    <tr>
        <td width="150px" height="40px">Keterangan</td>
        <td width="20px">:</td>
        <td>{{ $siswa->ket }}</td>
    </tr>
</table>
</body>
</html>