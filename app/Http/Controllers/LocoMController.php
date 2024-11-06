<?php

namespace App\Http\Controllers;

use App\Models\LocotrackM;
use Illuminate\Http\Request;

class LocoMController extends Controller
{
    public function index()
    {
        $locotrack_m = LocotrackM::all();
        //return $maintenance;
     return view('maintenance/locotrackm.index', compact('locotrack_m'));
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

        $locotrack_m = LocotrackM::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack_m) {
            return redirect()
                ->route('locotrackm.index')
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
        $locotrack_m = LocotrackM::findOrFail($id);
        return view('maintenance/locotrackm.edit', compact('locotrack_m'));
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

        $locotrack_m = LocotrackM::findOrFail($id);

        $locotrack_m->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack_m) {
            return redirect()
                ->route('locotrackm.index')
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
        $locotrack_m = LocotrackM::findOrFail($id);
        $locotrack_m->delete();

        if ($locotrack_m) {
            return redirect()
                ->route('locotrackm.index')
                ->with([
                    'success' => 'Maintenance Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('locotrackm.index')
                ->with([
                    'error' => 'Maintenance Gagal Dihapus'
                ]);
        }
    }
}
