<?php

namespace App\Http\Controllers\Api;

use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terminals = Terminal::paginate();
        return response()->json($terminals);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'tipe' => 'required|in:'.TERMINAL::TIPE_CHECKPOINT.','.TERMINAL::TIPE_TERMINAL.','.TERMINAL::TIPE_PUL 
        ]);

        $terminal = Terminal::create($request->all());
        return response()->json($terminal); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Terminal $terminal)
    {
        return response()->json($terminal);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Terminal $terminal)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'tipe' => 'required|in:'.TERMINAL::TIPE_CHECKPOINT.','.TERMINAL::TIPE_TERMINAL.','.TERMINAL::TIPE_PUL 
        ]);

        $terminal->kode = $request->kode;
        $terminal->nama = $request->nama;
        $terminal->alamat = $request->alamat;
        $terminal->provinsi = $request->provinsi;
        $terminal->kota = $request->kota;
        $terminal->kecamatan = $request->kecamatan;
        $terminal->tipe = $request->tipe;
        $terminal->save();

        return response()->json($terminal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Terminal $terminal)
    {
        $terminal->delete();
        return response()->json(['message' => 'Terminal berhasil dihapus']);
    }
}
