<?php

namespace App\Http\Controllers;

use App\Models\judul;
use App\Models\penerbit;
use App\Models\kategori;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $juduls = Judul::with('penerbit')->get();
    return view('judul.index', compact('juduls'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $penerbit = penerbit :: all();
        return view('judul.create', compact('penerbit',));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_judul'  => 'required|max:100',
        'nama_penerbit' => 'required|exists:penerbits,id', // pastikan nama tabel penerbits benar
        'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'sinopsis'    => 'nullable|max:500',
    ]);

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $validated['gambar'] = $filename;
    }

    Judul::create($validated);

    return redirect()->route('judul.index')->with('success', 'Judul berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     * */
    public function show(judul $judul)
    {
        //
        return view('judul.show', compact('judul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(judul $judul)
    {
        //
        return view('judul.edit', compact('judul'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, judul $judul)
    {
        //
        $request->validate([
           'nama_judul' => 'required|max:100',
            'nama_penerbit' => 'required|max:100',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sinopsis' => 'required|max:500',
        ]);

        //update data
        $judul->update([
            'nama_judul' => $request->nama_judul,
        ]);

        //redirect ke halaman index
        return redirect()->route('judul.index')->with('success', 'Judul berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Judul $judul)
{
    $judul->delete();
    return redirect()->route('judul.index')->with('success', 'Judul berhasil dihapus.');
}

}
