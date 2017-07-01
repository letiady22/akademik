<?php

namespace Letiady\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Letiady\Http\Requests;
use Letiady\Http\Controllers\Controller;
use Letiady\Jadwal;
use Letiady\Kelas;
use Letiady\Guru;
use Letiady\TahunAjar as Tahun;
use Letiady\Matpel;
use Letiady\Http\Requests\JadwalFormRequest;

class JadwalController extends Controller
{

    protected $jadwal;

    protected $hari = [
        'Senin', 'Selasa', 'Rabu',
        'Kamis', 'Jumat',
        'Sabtu', 'Minggu'
    ];

    public function __construct(Jadwal $jadwal)
    {
        $this->jadwal = $jadwal;
    }

    public function index(Request $request)
    {
        $jadwal = $this->jadwal->orderBy('created_at', 'ASC')->paginate(30);
        if ($request->has('search')) {
            $keyword = $request->get('search');
            $jadwal = $this->jadwal->whereHas('matpel', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE', "%{$keyword}%")
                        ->orderBy('nama', 'ASC');
                })
                ->orWhere('hari', 'LIKE', "%{$keyword}%")
                ->orWhere('jam_mulai', 'LIKE', "%{$keyword}%")
                ->orWhere('jam_akhir', 'LIKE', "%{$keyword}%")
                ->orWhere('semester', 'LIKE', "%{$keyword}%")
                ->orWhereHas('kelas', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE', "%{$keyword}%");
                })->orWhereHas('guru', function ($query) use ($keyword) {
                    $query->where('nama', 'LIKE', "%{$keyword}%");
                })->paginate(30);
        }
        return view('backend.jadwal.index', compact('jadwal'));
    }

    public function create(Guru $guru, Kelas $kelas, Tahun $tahun, Matpel $matpel)
    {
        $guru = $guru->all();
        $kelas = $kelas->orderBy('created_at', 'DESC')->get();
        $tahun = $tahun->orderBy('created_at', 'DESC')->get();
        $matpel = $matpel->orderBy('created_at', 'DESC')->get();
        $hari = $this->hari;
        return view('backend.jadwal.create', compact(
            'guru', 'kelas', 'tahun', 'matpel', 'hari'
        ));
    }

    public function store(JadwalFormRequest $request, 
        Guru $guru, Kelas $kelas, Tahun $tahun, Matpel $matpel)
    {
        $guru = $guru->findOrFail($request->get('pengajar'));
        $kelas = $kelas->findOrFail($request->get('kelas'));
        $tahun = $tahun->findOrFail($request->get('tahun_ajaran'));
        $matpel = $matpel->findOrFail($request->get('matpel'));
        $jadwal = $this->jadwal->create($request->except([
            'pengajar', 'kelas', 'tahun_ajaran' ]));
        $guru->jadwal()->save($jadwal);
        $kelas->jadwal()->save($jadwal);
        $tahun->jadwal()->save($jadwal);
        $matpel->jadwal()->save($jadwal);
        $request->session()->flash('success', 'Data jadwal berhasil ditambahkan.');
        return redirect()->route('backend.jadwal.edit', $jadwal->id);

    }

    public function edit($id, Guru $guru, Kelas $kelas, Tahun $tahun, Matpel $matpel)
    {
        $jadwal = $this->jadwal->findOrFail($id);
        $guru = $guru->all();
        $kelas = $kelas->orderBy('created_at', 'DESC')->get();
        $tahun = $tahun->orderBy('created_at', 'DESC')->get();
        $matpel = $matpel->orderBy('created_at', 'DESC')->get();
        $hari = $this->hari;
        return view('backend.jadwal.edit', compact(
            'jadwal', 'guru', 'kelas', 'tahun', 'matpel', 'hari'
        ));
    }

    public function update($id, JadwalFormRequest $request, 
        Guru $guru, Kelas $kelas, Tahun $tahun, Matpel $matpel)
    {
        $guru = $guru->findOrFail($request->get('pengajar'));
        $kelas = $kelas->findOrFail($request->get('kelas'));
        $tahun = $tahun->findOrFail($request->get('tahun_ajaran'));
        $jadwal = $this->jadwal->findOrFail($id);
        $matpel = $matpel->findOrFail($request->get('matpel'));
        $jadwal->fill($request->except(['guru', 'kelas', 'tahun' ]))->save();
        $guru->jadwal()->save($jadwal);
        $kelas->jadwal()->save($jadwal);
        $tahun->jadwal()->save($jadwal);
        $matpel->jadwal()->save($jadwal);
        $request->session()->flash('success', 'Data jadwal berhasil diubah.');
        return redirect()->back();
    }

    public function destroy($id, Request $request)
    {
        $jadwal = $this->jadwal->findOrFail($id);
        $jadwal->delete();
        $request->session()->flash('success', 'Data jadwal berhasil dihapus.');
        return redirect()->route('backend.jadwal.index');
    }

}
