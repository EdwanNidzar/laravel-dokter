<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        return view('pasien.dashboard');
    }

    public function index()
    {
        $dokter = User::where('role', 'dokter')->get();

        // Ambil riwayat periksa berdasarkan user yang login
        $riwayat = Periksa::where('status', 'Selesai')
            ->with(['dokter' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();

        return view('pasien.index', compact('dokter', 'riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
        ]);

        Periksa::create([
            'pasien_id' => Auth::id(),
            'dokter_id' => $request->dokter_id,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('pasien.index')->with('success', 'Data periksa berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
