<?php

namespace App\Http\Controllers;

use App\Models\JaringanL;
use Illuminate\Http\Request;

class JaringanLController extends Controller
{
    public function index()
    {
        $jaringan_l = JaringanL::all();
        //return $maintenance;
     return view('layanan/jaringanl.index', compact('jaringan_l'));
    }
    public function store(Request $request)
    {
         $this->validate($request, [
            'unit' => 'required',
            'inventaris' => 'required|string|max:255',
            'user' => 'required',
            'tanggal_rencana' => 'required',
            'tanggal_relasasi' => 'required',
        ]);

        $jaringan_l = JaringanL::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($jaringan_l) {
            return redirect()
                ->route('jaringanl.index')
                ->with([
                    'success' => 'Data Layanan Jaringan Berhasil Ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Gagal Menambahkan'
                ]);
        }
    }

       public function edit($id)
    {
        $jaringan_l = JaringanL::findOrFail($id);
        return view('layanan/jaringanl.edit', compact('jaringan_l'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'unit' => 'required',
            'inventaris' => 'required|string|max:255',
            'user' => 'required',
            'tanggal_rencana' => 'required',
            'tanggal_relasasi' => 'required',
        ]);

        $jaringan_l = JaringanL::findOrFail($id);

        $jaringan_l->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($jaringan_l) {
            return redirect()
                ->route('jaringanl.index')
                ->with([
                    'success' => 'Data Layanan berhasil Di ubah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }



    public function destroy($id)
    {
        $jaringan_l = JaringanL::findOrFail($id);
        $jaringan_l->delete();

        if ($jaringan_l) {
            return redirect()
                ->route('jaringanl.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('jaringanl.index')
                ->with([
                    'error' => 'Data Gagal Dihapus'
                ]);
        }
    }
}
