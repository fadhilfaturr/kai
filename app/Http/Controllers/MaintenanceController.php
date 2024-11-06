<?php

namespace App\Http\Controllers;

use App\Models\Hardware;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $hardware = Hardware::all();
        //return $maintenance;
     return view('maintenance.index', compact('hardware'));
    }

    public function show($id)
    {
        $hardware = Hardware::findOrFail($id);
        return view('maintenance.edit', compact('hardware'));
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'unit' => 'required',
            'id' => 'required',
            'inventaris' => 'required|string|max:255',
            'user' => 'required',
            'tanggal_rencana' => 'required',
            'tanggal_relasasi' => 'required',
            'input_form' => 'required'
        ]);

        $hardware = Hardware::create([
            'unit' => $request->unit,
            'id' => $request->id,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
            'input_form' => $request->input_form

        ]);

        if ($hardware) {
            return redirect()
                ->route('maintenance.index')
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
        $hardware = Hardware::findOrFail($id);
        return view('maintenance.edit', compact('hardware'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'unit' => 'required',
            'id' => 'required',
            'inventaris' => 'required|string|max:255',
            'user' => 'required',
            'tanggal_rencana' => 'required',
            'tanggal_relasasi' => 'required',
            'input_form' => 'required'
        ]);

        $hardware = Hardware::findOrFail($id);

        $hardware->update([
            'unit' => $request->unit,
            'id' => $request->id,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
            'input_form' => $request->input_form
        ]);

        if ($hardware) {
            return redirect()
                ->route('maintenance.index')
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
        $hardware = Hardware::findOrFail($id);
        $hardware->delete();

        if ($hardware) {
            return redirect()
                ->route('maintenance.index')
                ->with([
                    'success' => 'Maintenance Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('maintenance.index')
                ->with([
                    'error' => 'Maintenance Gagal Dihapus'
                ]);
        }
    }
}
