<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitFormRequest;
use App\Models\CV;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $cv = CV::latest()->get();

        return inertia('CV', compact('cv'));
    }

    public function show($test)
    {
        $cv = CV::find($test);

        dd($cv);
    }

    public function create()
    {
        return inertia('TambahData');
    }

    public function store(SubmitFormRequest $request)
    {
        CV::create($request->validated());

        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }

    public function edit(CV $test)
    {
        return inertia('Edit', compact('test'));
    }

    public function update(Request $request, CV $test)
    {
//        $test->update($request->validated());

        $this->validate($request, [
            'nama' => 'required|max:20',
            'kelas' => 'required|max:20',
            'jurusan' => 'required|min:3|max:50',
            'handphone' => 'required|max:13',
            'alamat' => 'required|max:255',
            'hobi' => 'required',
            'citacita' => 'required|max:50',
            'bahasa' => 'required|max:30',
        ], [
            'nama.required' => 'Kolom nama harus diisi',
            'nama.max' => 'Kolom nama maksimal 20 karakter',
            'kelas.required' => 'Kolom kelas harus diisi',
            'kelas.max' => 'Kolom kelas maksimal 20 karakter',
            'jurusan.required' => 'Kolom jurusan harus diisi',
            'jurusan.max' => 'Kolom jurusan maksimal 50 karakter',
            'jurusan.min' => 'Kolom jurusan minimal 3 karakter',
            'handphone.required' => 'Kolom handphone harus diisi',
            'handphone.max' => 'Kolom handphone maksimal 50 karakter',
            'alamat.max' => 'Kolom alamat maksimal 255 karakter',
            'alamat.required' => 'Kolom alamat harus diisi',
            'hobi.required' => 'Kolom hobi harus diisi',
            'citacita.required' => 'Kolom cita-cita harus diisi',
            'citacita.max' => 'Kolom cita-cita maksimal 50 karakter',
            'bahasa.required' => 'Kolom bahasa harus diisi',
            'bahasa.max' => 'Kolom bahasa maksimal 30 karakter',
        ]);

        return redirect()->route('test.index')->with('message', 'Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $cv = CV::findOrFail($id);
        $cv->delete();

        return redirect()->back()->with('message', 'Data CV berhasil dihapus!');
    }
}
