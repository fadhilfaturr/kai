<?php

namespace App\Http\Controllers;

use App\Models\Locotrack;
use Illuminate\Http\Request;

class TenancesController extends Controller
{
    public function index()
    {
        $locotrack = Locotrack::all();
        //return $maintenance;
     return view('locotrack.index', compact('locotrack'));
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

        $locotrack = Locotrack::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack) {
            return redirect()
                ->route('locotrack.index')
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
        $locotrack = Locotrack::findOrFail($id);
        return view('locotrack.edit', compact('locotrack'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'unit' => 'required',
            'inventaris' => 'required|string|max:255s',
            'user' => 'required',
            'tanggal_rencana' => 'required',
            'tanggal_relasasi' => 'required',
        ]);

        $locotrack = Locotrack::findOrFail($id);

        $locotrack->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($locotrack) {
            return redirect()
                ->route('locotrack.index')
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
        $locotrack = Locotrack::findOrFail($id);
        $locotrack->delete();

        if ($locotrack) {
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
