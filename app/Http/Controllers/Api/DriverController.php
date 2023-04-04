<?php

namespace App\Http\Controllers\Api;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::paginate();

        return response()->json($drivers);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_reg' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:P,L'
        ]);

        $drivers = Driver::create($request->all());
        return response()->json($drivers); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        return response()->json($driver);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'no_reg' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:P,L'
        ]);

        $driver->no_reg = $request->no_reg;
        $driver->nama = $request->nama;
        $driver->alamat = $request->alamat;
        $driver->jenis_kelamin = $request->jenis_kelamin;
        $driver->save();

        return response()->json($driver);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return response()->json(['message' => 'Driver berhasil dihapus']);
    }
}
