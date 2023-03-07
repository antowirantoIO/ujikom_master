<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::role('petugas')->get();
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'kode_petugas' => $request->kode_user,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone,
            'is_active' => 1,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect(route('petugas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $petugas = User::findOrFail($id);

        return response()->json($petugas, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = User::findOrFail($id);

        $petugas->update([
            'name' => $request->nama,
            'email' => $request->email,
            'kode_petugas' => $request->kode_user,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone,
        ]);

        return redirect(route('petugas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);

        foreach($petugas->transaksi as $transaksi){
            $transaksi->delete();
        }

        $petugas->delete();
        return redirect(route('petugas.index'));
    }
}
