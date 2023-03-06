<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsumen = Konsumen::all();

        return view('konsumen.index', compact('konsumen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Konsumen::create([
            'kode_konsumen' => $request->kode_konsumen,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone,
            'is_active' => 1
        ]);

        return redirect(route('konsumen.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsumen $konsumen)
    {
        return response()->json($konsumen, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumen $konsumen)
    {
        $konsumen->update([
            'kode_konsumen' => $request->kode_konsumen,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone
        ]);

        return redirect(route('konsumen.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumen $konsumen)
    {
        foreach($konsumen->transaksi as $transaksi){
            $transaksi->delete();
        }

        $konsumen->delete();
        return redirect(route('konsumen.index'));
    }
}
