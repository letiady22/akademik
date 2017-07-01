<?php

namespace Letiady\Http\Controllers\Backend;

use Illuminate\Http\Request;

use Letiady\Http\Requests;
use Letiady\Http\Controllers\Controller;
use Letiady\Matpel;
use Letiady\Guru;
use Letiady\Http\Requests\MatpelFormRequest;

class MatpelController extends Controller
{

    protected $matpel;

    public function __construct(Matpel $matpel)
    {
        $this->matpel = $matpel;
    }

    public function index(Request $request)
    {
        $matpel = $this->matpel->orderBy('created_at', 'ASC')->paginate(15);
        if ($request->has('search')) {
            $keyword = $request->get('search');
            $matpel = $this->matpel->where('nama', 'LIKE', "%{$keyword}%")
                ->orderBy('nama', 'ASC')->paginate(15);
        }
        return view('backend.matpel.index', compact('matpel'));
    }

    public function create()
    {
        return view('backend.matpel.create');
    }

    public function store(MatpelFormRequest $request)
    {
        $matpel = $this->matpel->create([
            'nama' => $request->get('mata_pelajaran')
        ]);
        $request->session()->flash('success', 'Mata pelajaran berhasil di tambahkan.');
        return redirect()->route('backend.matpel.edit', $matpel->id);
    }

    public function edit($id)
    {
        $matpel = $this->matpel->findOrFail($id);
        return view('backend.matpel.edit', compact('matpel'));
    }

    public function update($id, MatpelFormRequest $request)
    {
        $matpel = $this->matpel->findOrFail($id);
        $matpel->fill([
            'nama' => $request->get('mata_pelajaran')
        ])->save();
        $request->session()->flash('success', 'Mata pelajaran berhasil di ubah.');
        return redirect()->route('backend.matpel.edit', $matpel->id);
    }

    public function destroy($id, Request $request)
    {
        $matpel = $this->matpel->findOrFail($id);
        $matpel->delete();
        $request->session()->flash('success', 'Mata pelajaran berhasil di hapus.');
        return redirect()->route('backend.matpel.index');
    }

}
