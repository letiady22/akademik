<?php

namespace Letiady\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Letiady\Http\Requests;
use Letiady\Http\Controllers\Controller;
use Letiady\Kelas;
use Letiady\Guru;
use Letiady\TahunAjar as Tahun;
use Letiady\Jurusan;
use Letiady\Http\Requests\KelasFormRequest;

class KelasController extends Controller
{

    protected $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function index(Request $request)
    {
        $kelas = $this->kelas->orderBy('created_at', 'ASC')->paginate(30);

        if ($request->has('search')) {
            $keyword = $request->get('search');
            $kelas = $this->kelas->where('nama', 'LIKE', "%{$keyword}%")
                ->orWhereHas('guru', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE',  "%{$keyword}%");
                })->orWhereHas('jurusan', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE',  "%{$keyword}%");
                })->orderBy('nama', 'ASC')->paginate(30);
        }

        return view('backend.kelas.index', compact('kelas'));
    }

    public function show($id)
    {
        $kelas = $this->kelas->with([
            'guru', 'jurusan', 'tahunAjar', 'jadwal', 'siswa'
        ])->find($id);
        return view('backend.kelas.show', compact('kelas'));
    }

    public function create(Guru $guru, Tahun $tahun, Jurusan $jurusan)
    {
        $guru = $guru->all();
        $tahun = $tahun->all();
        $jurusan = $jurusan->all();
        return view('backend.kelas.create', compact('tahun', 'guru', 'jurusan'));
    }

    public function store(KelasFormRequest $request, Guru $guru, Tahun $tahun, Jurusan $jurusan)
    {
        $kelas = $this->kelas->create(['nama' => $request->get('nama_kelas')]);
        if ($request->has('jurusan')) {
            $jurusan = $jurusan->find($request->get('jurusan'));
            $jurusan->kelas()->save($kelas);
        }
        if ($request->has('wali_kelas')) {
            $guru = $guru->find($request->get('wali_kelas'));
            $guru->kelas()->save($kelas);
        }
        $tahun = $tahun->findOrFail($request->get('tahun_ajaran'));
        $tahun->kelas()->save($kelas);
        $request->session()->flash('success', 'Data kelas berhasil ditambahkan.');
        return redirect()->route('backend.kelas.index');
    }

    public function edit($id, Guru $guru, Tahun $tahun, Jurusan $jurusan)
    {
        $kelas = $this->kelas->findOrFail($id);
        $guru = $guru->all();
        $tahun = $tahun->all();
        $jurusan = $jurusan->all();
        return view('backend.kelas.edit', compact(
            'tahun', 'guru', 'kelas', 'jurusan'
        ));
    }

    public function update($id, KelasFormRequest $request, Guru $guru, Tahun $tahun)
    {
        $kelas = $this->kelas->findOrFail($id);
        $kelas->fill(['nama' => $request->get('nama')])->save();
        if ($request->has('jurusan')) {
            $jurusan = $jurusan->find($request->get('jurusan'));
            $jurusan->kelas()->save($kelas);
        }
        if ($request->has('wali_kelas')) {
            $guru = $guru->find($request->get('wali_kelas'));
            $guru->kelas()->save($kelas);
        }
        $tahun = $tahun->findOrFail($request->get('tahun_ajaran'));
        $tahun->kelas()->save($kelas);
        $request->session()->flash('success', 'Data kelas berhasil diubah.');
        return redirect()->back();
    }

    public function delete($id)
    {
        $kelas = $this->kelas->findOrFail($id);
        $kelas->delete();
        $request->session()->flash('success', 'Data kelas berhasil dihapus.');
        return redirect()->route('backend.kelas.index');
    }

}
