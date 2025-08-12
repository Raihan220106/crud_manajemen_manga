<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penerbits = penerbit::all();
        return view('penerbit.index', compact('penerbits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat valiadasi
        $validasiData=$request->validate([
            'nama_penerbit' => 'required|max:100',
        ]);
        //simpan data
        penerbit::create([
            'nama_penerbit' => $request->nama_penerbit,]);
        
        //redirect ke halaman index
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil ditambahkan.');
    }
    /**
     * Display the specified resource.
     * */
    public function show(penerbit $penerbit)
    {
        //
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penerbit $penerbit)
    {
        //
        return view('penerbit.edit', compact('penerbit'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penerbit $penerbit)
    {
        //
        $request->validate([
            'nama_penerbit' => 'required|string|max:255',
        ]);

        //update data
        $penerbit->update([
            'nama_penerbit' => $request->nama_penerbit,
        ]);

        //redirect ke halaman index
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penerbit $penerbit)
    {
        //
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus.');
    }
}
