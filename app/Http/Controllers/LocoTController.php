<?php

namespace App\Http\Controllers;

use App\Models\LocotrackT;
use Illuminate\Http\Request;

class LocoTController extends Controller
{
    public function index()
    {
        $locotrack_t = LocotrackT::all();
        //return $maintenance;
     return view('troubleshoot/locotrackt.index', compact('locotrack_t'));
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

        $locotrack_t = LocotrackT::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack_t) {
            return redirect()
                ->route('locotrackt.index')
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
        $locotrack_t = LocotrackT::findOrFail($id);
        return view('troubleshoot/locotrackt.edit', compact('locotrack_t'));
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

        $locotrack_t = LocotrackT::findOrFail($id);

        $locotrack_t->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack_t) {
            return redirect()
                ->route('locotrackt.index')
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
        $locotrack_t = LocotrackT::findOrFail($id);
        $locotrack_t->delete();

        if ($locotrack_t) {
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
