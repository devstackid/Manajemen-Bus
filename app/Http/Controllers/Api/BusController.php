<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::paginate();

        return response()->json($buses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_plat' => 'required',
            'nomor_bus' => 'required',
            'distributor' => 'required',
            'muatan' => 'required|int'
        ]);

        $bus = Bus::create([
            'nomor_plat' => $request->nomor_plat,
            'nomor_bus' => $request->nomor_bus,
            'distributor' => $request->distributor,
            'muatan' => $request->muatan
        ]);

        return response()->json($bus);
    }

    public function show(Bus $bus)
    {
        return response()->json($bus);
    }

    public function update(Bus $bus, Request $request)
    {
        $request->validate([
            'nomor_plat' => 'required',
            'nomor_bus' => 'required',
            'distributor' => 'required',
            'muatan' => 'required|int'
        ]);

        $bus->nomor_plat = $request->nomor_plat;
        $bus->nomor_bus = $request->nomor_bus;
        $bus->distributor = $request->distributor;
        $bus->muatan = $request->muatan;
        $bus->save();

        return response()->json($bus);
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return response()->json();
    }
}
