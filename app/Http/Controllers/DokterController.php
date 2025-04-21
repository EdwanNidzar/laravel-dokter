<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;

class DokterController extends Controller
{
    public function index()
    {
        return view('dokter.index');
    }

    public function create()
    {
        // return view('dokter.create');
    }

    public function dashboard()
    {
        $periksas = Periksa::where('dokter_id', auth()->id())->get();
        return view('dokter.dashboard', compact('periksas'));
    }

    public function memeriksa()
    {
        $periksas = Periksa::where('dokter_id', auth()->id())
                           ->where('status', 'Menunggu')
                           ->get();
        return view('dokter.memeriksa', compact('periksas'));
    }

    public function dokterPeriksa($id)
    {
        $periksa = Periksa::findOrFail($id);
        return view('dokter.periksa', compact('periksa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'biaya_periksa' => 'nullable|string|max:255',
            'status' => 'required|in:Menunggu,Selesai',
        ]);

        $periksa = Periksa::findOrFail($id);

        // Pastikan dokter hanya bisa mengedit miliknya
        if ($periksa->dokter_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $periksa->update([
            'biaya_periksa' => $request->biaya_periksa,
            'tanggal' => now(),
            'status' => $request->status,
        ]);

        return redirect()->route('dokter.memeriksa')->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }


}
