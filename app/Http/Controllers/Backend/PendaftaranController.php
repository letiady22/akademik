<?php

namespace Letiady\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Letiady\Http\Requests;
use Letiady\Http\Controllers\Controller;
use Letiady\Pendaftaran;
use Letiady\Http\Requests\PendaftaranFormRequest as RegFormRequest;
use Letiady\DetailSiswa as Siswa;
use Letiady\TahunAjar;
use PDF;

class PendaftaranController extends Controller
{

    protected $reg;

    public function __construct(Pendaftaran $reg)
    {
        $this->reg = $reg;
    }

    public function index(Request $request)
    {
        $regs = $this->reg->orderBy('created_at', 'ASC')->paginate(30);

        if ($request->has('search')) {
            $keyword = $request->get('search');
            $regs = $this->reg->where('nama', 'LIKE', "%{$keyword}%")
                ->orWhere('no_reg', 'LIKE', "%{$keyword}%")
                ->orWhere('asal_sekolah', 'LIKE', "%{$keyword}%")
                ->orWhere('alamat_sekolah', 'LIKE', "%{$keyword}%")
                ->orWhere('tahun_lulus', 'LIKE', "%{$keyword}%")
                ->orWhere('no_ijazah', 'LIKE', "%{$keyword}%")
                ->orderBy('nama', 'ASC')->paginate(30);
        }
        return view('backend.reg.index', compact('regs'));
    }

    public function show($id)
    {
        $reg = $this->reg->findOrFail($id);
        return view('backend.reg.show', compact('reg'));
    }

    public function create(TahunAjar $tahunAjar)
    {
        $tahunAjar = $tahunAjar->all();
        return view('backend.reg.create', compact('tahunAjar'));
    }

    public function store(RegFormRequest $request, TahunAjar $tahunAjar)
    {
        $data = $request->except('_token');
        $reg = $this->reg->create($data);
        $tahunAjar = $tahunAjar->findOrFail($data['tahun_ajar']);
        $tahunAjar->pendaftaran()->save($reg);
        $request->session()->flash('success', 'Data pendaftaran berhasil ditambahkan.');
        return redirect()->route('backend.pendaftaran.show', $reg->id);
    }

    public function edit($id, TahunAjar $tahunAjar)
    {
        $reg = $this->reg->findOrFail($id);
        $tahunAjar = $tahunAjar->all();
        return view('backend.reg.edit', compact('reg', 'tahunAjar'));
    }

    public function update($id, RegFormRequest $request)
    {
        $data = $request->except('_token');
        $reg = $this->reg->findOrFail($id);
        $reg->fill($data)->save();
        $request->session()->flash('success', 'Data pendaftaran berhasil diubah.');
        return redirect()->route('backend.pendaftaran.show', $reg->id);
    }

    public function destroy($id, Request $request)
    {
        $reg = $this->reg->findOrFail($id);
        $reg->delete();
        $request->session()->flash('success', 'Data pendaftaran berhasil dihapus.');
        return redirect()->route('backend.reg.index');
    }

    public function report($id)
    {
        $reg = $this->reg->findOrFail($id);
        $pdf = PDF::loadView('backend.reports.penerimaan', [
            'reg' => $reg
        ]);
        return $pdf->stream(time().'_'.$reg->nama);
    }

}
