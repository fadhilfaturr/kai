<?php

namespace App\Http\Controllers;

use App\Models\Jaringan;
use Illuminate\Http\Request;

class TroubleshootController extends Controller
{
    public function index()
    {
        $jaringan = Jaringan::all();
        //return $maintenance;
     return view('troubleshoot.index', compact('jaringan'));
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

        $jaringan = Jaringan::create([
            'unit' => $request->unit,
            'id' => $request->id,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
            'input_form' => $request->input_form

        ]);

        if ($jaringan) {
            return redirect()
                ->route('troubleshoot.index')
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
        $jaringan = Jaringan::findOrFail($id);
        return view('troubleshoot.edit', compact('jaringan'));
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

        $jaringan = Jaringan::findOrFail($id);

        $jaringan->update([
            'unit' => $request->unit,
            'id' => $request->id,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
            'input_form' => $request->input_form
        ]);

        if ($jaringan) {
            return redirect()
                ->route('troubleshoot.index')
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
        $jaringan = Jaringan::findOrFail($id);
        $jaringan->delete();

        if ($jaringan) {
            return redirect()
                ->route('troubleshoot.index')
                ->with([
                    'success' => 'Maintenance Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('troubleshoot.index')
                ->with([
                    'error' => 'Maintenance Gagal Dihapus'
                ]);
        }
    }
}
