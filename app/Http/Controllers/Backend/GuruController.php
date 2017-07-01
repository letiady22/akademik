<?php

namespace Letiady\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Letiady\Http\Requests;
use Letiady\Http\Controllers\Controller;
use Letiady\Guru;
use Letiady\Matpel;
use Letiady\Http\Requests\GuruFormRequest;

class GuruController extends Controller
{

    protected $guru;

    public function __construct(Guru $guru)
    {
        $this->guru = $guru;
    }

    public function index(Request $request)
    {
        $guru = $this->guru->paginate(15);
        if ($request->has('search')) {
            $keyword = $request->get('search');
            $guru = $this->guru->where('nama', 'LIKE', "%{$keyword}%")
                ->orWhere('NIP', 'LIKE', "%{$keyword}%")
                ->orWhere('sex', 'LIKE', "%{$keyword}%")
                ->orWhere('alamat', 'LIKE', "%{$keyword}%")
                ->orWhere('jabatan', 'LIKE', "%{$keyword}%")
                ->orWhere('golongan', 'LIKE', "%{$keyword}%")
                ->orWhere('status_guru', 'LIKE', "%{$keyword}%")
                ->orderBy('nama', 'ASC')->paginate(30);
        }
        return view('backend.guru.index', compact('guru'));
    }

    public function create(Matpel $matpel)
    {
        $matpel = $matpel->lists('nama');
        return view('backend.guru.create', compact('matpel'));
    }

    public function store(GuruFormRequest $request)
    {
        $data = $request->except('_token');
        $data['sex'] = $request->get('jenis_kelamin');
        $data['tmp_lahir'] = $request->get('tempat_lahir');
        $data['tgl_lahir'] = $request->get('tanggal_lahir');
        $data['status_guru'] = $request->get('status');
        $data['ket'] = $request->get('keterangan');
        $guru = $this->guru->create($data);
        $guru->syncMatpel($data['mata_pelajaran']);
        $request->session()->flash('success', 'Data guru berhasil ditambahkan.');
        return redirect()->route('backend.guru.edit', $guru->id);
    }

    public function show($id)
    {
        $guru = $this->guru->with('matpel')->findOrFail($id);
        return view('backend.guru.show', compact('guru'));
    }

    public function edit($id, Matpel $matpel)
    {
        $guru = $this->guru->with(['matpel'])->findOrFail($id);
        $matpel = $matpel->lists('nama');
        return view('backend.guru.edit', compact('guru', 'matpel'));
    }

    public function update($id, GuruFormRequest $request)
    {
        $data = $request->except('_token');
        $data['sex'] = $request->get('jenis_kelamin');
        $data['tmp_lahir'] = $request->get('tempat_lahir');
        $data['tgl_lahir'] = $request->get('tanggal_lahir');
        $data['status_guru'] = $request->get('status');
        $data['ket'] = $request->get('keterangan');
        $guru = $this->guru->findOrFail($id);
        $guru->fill($data)->save();
        $guru->syncMatpel($data['mata_pelajaran']);
        $request->session()->flash('success', 'Data guru berhasil diubah.');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $guru = $this->guru->findOrFail($id);
        if (count($guru->matpel) > 0)
            $guru->matpel()->detach($guru->matpel()->lists('id_matpel'));
        $guru->delete();
        $request->session()->flash('success', 'Data guru berhasil dihapus.');
        return redirect()->route('backend.guru.index');
    }

}
