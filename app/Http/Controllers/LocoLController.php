<?php

namespace App\Http\Controllers;

use App\Models\LocotrackL;
use Illuminate\Http\Request;

class LocoLController extends Controller
{
    public function index()
    {
        $locotrack_l = LocotrackL::all();
        //return $maintenance;
     return view('layanan/locotrackl.index', compact('locotrack_l'));
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

        $locotrack_l = LocotrackL::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack_l) {
            return redirect()
                ->route('locotrackl.index')
                ->with([
                    'success' => 'Data Berhasil Ditambahkan'
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
        $locotrack_l = LocotrackL::findOrFail($id);
        return view('layanan/locotrackl.edit', compact('locotrack_l'));
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

        $locotrack_l = LocotrackL::findOrFail($id);

        $locotrack_l->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack_l) {
            return redirect()
                ->route('locotrackl.index')
                ->with([
                    'success' => 'Data Maintenance berhasil Di ubah'
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
        $locotrack_l = LocotrackL::findOrFail($id);
        $locotrack_l->delete();

        if ($locotrack_l) {
            return redirect()
                ->route('locotrack.index')
                ->with([
                    'success' => 'Maintenance Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('locotrack.index')
                ->with([
                    'error' => 'Maintenance Gagal Dihapus'
                ]);
        }
    }
}
