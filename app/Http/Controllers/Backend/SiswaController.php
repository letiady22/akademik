<?php

namespace Letiady\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Letiady\Http\Requests;
use Letiady\Http\Controllers\Controller;
use Letiady\DetailSiswa as Siswa;
use Letiady\Pendaftaran;
use Letiady\TahunAjar as Tahun;
use Letiady\Kelas;
use Letiady\Http\Requests\SiswaFormRequest;
use Letiady\Http\Requests\AttachKelasFormRequest as KelasRequest;
use PDF;

class SiswaController extends Controller
{

    protected $siswa;

    public function __construct(Siswa $siswa)
    {
        $this->siswa = $siswa;
    }

    public function index(Request $request)
    {
        $siswa = $this->siswa->orderBy('created_at', 'ASC')->paginate(30);

        if ($request->has('search')) {

            $keyword = $request->get('search');

            $siswa = $this->siswa->where('nama', 'LIKE', "%{$keyword}%")
                ->orWhere('NIS', 'LIKE', "%{$keyword}%")
                ->orWhere('alamat', 'LIKE', "%{$keyword}")
                ->orWhere('sex', 'LIKE', "%{$keyword}")
                ->orWhere('tmp_lahir', 'LIKE', "%{$keyword}%")
                ->orWhere('tgl_lahir', 'LIKE', "%{$keyword}%")
                ->orWhere('kode_pos', 'LIKE', "%{$keyword}%")
                ->orWhere('nama_ibu', 'LIKE', "%{$keyword}%")
                ->orWhere('nama_ayah', 'LIKE', "%{$keyword}%")
                ->orWhere('nama_wali', 'LIKE', "%{$keyword}%")
                ->orWhere('agama', 'LIKE', "%{$keyword}%")
                ->orWhereHas('detailKelas', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE', "%{$keyword}%");
                })->orderBy('nama', 'ASC')->paginate(30);
                
        }
        return view('backend.siswa.index', compact('siswa'));
    }

    public function show($id, Kelas $kelas)
    {
        $siswa = $this->siswa->with(['pendaftaran'])->findOrFail($id);
        $kelas = $kelas->all();
        return view('backend.siswa.show', compact('siswa', 'kelas'));
    }

    public function create(Request $request, Tahun $tahun, Pendaftaran $reg)
    {
        $reg = $request->has('reg_id') ? $reg->findOrFail($request->get('reg_id')) : null;
        $tahun = $tahun->all();
        return view('backend.siswa.create', compact('reg', 'tahun'));
    }

    public function store(SiswaFormRequest $request, Pendaftaran $reg)
    {
        $data = $request->except([
            '_token', 'tanggal_pendidikan', 'tanggal_lahir',
            'tempat_lahir', 'jenis_kelamin'
        ]);

        $data['tgl_pend'] = $request->get('tanggal_pendidikan');
        $data['tgl_lahir'] = $request->get('tanggal_lahir');
        $data['tmp_lahir'] = $request->get('tempat_lahir');
        $data['sex'] = $request->get('jenis_kelamin');
        $data['ket'] = $request->get('keterangan');
        $data['gol_darah'] = $request->get('golongan_darah');
        $data['ket'] = $request->get('keterangan');
        $data['pek_ayah'] = $request->get('pekerjaan_ayah');
        $data['pek_ibu'] = $request->get('pekerjaan_ibu');

        $siswa = $this->siswa->create($data);

        if ($request->get('reg_id')) {

            $reg = $reg->find($request->get('reg_id'));

            if ($reg) {
                if (count($reg->detailSiswa) == 0) {
                    $reg->detailSiswa()->save($siswa);
                }
            }
        }
        
        $request->session()->flash('success', 'Data siswa berhasil ditambahkan.');
        return redirect()->route('backend.siswa.show', $siswa->id);
    }

    public function edit($id, Tahun $tahun)
    {
        $siswa = $this->siswa->findOrFail($id);
        $tahun = $tahun->all();
        return view('backend.siswa.edit', compact('tahun', 'siswa'));
    }

    public function update($id, SiswaFormRequest $request, Tahun $tahun)
    {
        // $tahun = $tahun->findOrFail($request->get('tahun_ajaran'));
        $data = $request->except([
            '_token', 'tanggal_pendidikan', 'tanggal_lahir',
            'tempat_lahir', 'jenis_kelamin'
        ]);

        $data['tgl_pend'] = $request->get('tanggal_pendidikan');
        $data['tgl_lahir'] = $request->get('tanggal_lahir');
        $data['tmp_lahir'] = $request->get('tempat_lahir');
        $data['sex'] = $request->get('jenis_kelamin');
        $data['ket'] = $request->get('keterangan');
        $data['gol_darah'] = $request->get('golongan_darah');
        $data['ket'] = $request->get('keterangan');
        $data['pek_ayah'] = $request->get('pekerjaan_ayah');
        $data['pek_ibu'] = $request->get('pekerjaan_ibu');

        $siswa = $this->siswa->findOrFail($id);
        $siswa->fill($data)->save();
        // $tahun->siswa()->save($siswa);
        $request->session()->flash('success', 'Data siswa berhasil diubah.');
        return redirect()->route('backend.siswa.show', $siswa->id);
    }

    public function destroy($id, Request $request)
    {
        $siswa = $this->siswa->findOrFail($id);
        $siswa->delete();
        $request->session()->flash('success', 'Data siswa berhasil dihapus.');
        return redirect()->route('backend.siswa.index');
    }

    public function addKelas(Kelas $kelas, KelasRequest $request)
    {
        $kelas = $kelas->findOrFail($request->get('kelas'));
        $siswa = $this->siswa->findOrFail($request->get('siswa'));

        $siswa->detailKelas()->attach($kelas);
        $request->session()->flash('success', 'Data kelas berhasil ditambahkan.');

        return redirect()->back();
    }

    public function report($id)
    {
        $data = $this->siswa->findOrFail($id);
        $pdf = PDF::loadView('backend.reports.siswa', [
            'siswa' => $data
        ]);
        return $pdf->stream(time().'_'.$data->nama);
    }

}
