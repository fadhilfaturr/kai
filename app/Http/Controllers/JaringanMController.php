<?php

namespace App\Http\Controllers;

use App\Models\JaringanM;
use Illuminate\Http\Request;

class JaringanMController extends Controller
{
    public function index()
    {
        $jaringan_m = JaringanM::all();
        //return $maintenance;
     return view('maintenance/jaringanm.index', compact('jaringan_m'));
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

        $jaringan_m = JaringanM::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($jaringan_m) {
            return redirect()
                ->route('jaringanm.index')
                ->with([
                    'success' => 'Data Jaringan Maintenance Berhasil Ditambahkan'
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
        $jaringan_m = JaringanM::findOrFail($id);
        return view('maintenance/jaringanm.edit', compact('jaringan_m'));
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

        $jaringan_m = JaringanM::findOrFail($id);

        $jaringan_m->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($jaringan_m) {
            return redirect()
                ->route('jaringanm.index')
                ->with([
                    'success' => 'Data Jaringan Maintenance berhasil Di ubah'
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
        $jaringan_m = JaringanM::findOrFail($id);
        $jaringan_m->delete();

        if ($jaringan_m) {
            return redirect()
                ->route('jaringanm.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('jaringanm.index')
                ->with([
                    'error' => 'Data Gagal Dihapus'
                ]);
        }
    }
}
