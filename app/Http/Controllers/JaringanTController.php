<?php

namespace App\Http\Controllers;

use App\Models\JaringanT;
use Illuminate\Http\Request;

class JaringanTController extends Controller
{
    public function index()
    {
        $jaringan_t = JaringanT::all();
        //return $maintenance;
     return view('troubleshoot/jaringant.index', compact('jaringan_t'));
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

        $jaringan_t = JaringanT::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($jaringan_t) {
            return redirect()
                ->route('jaringant.index')
                ->with([
                    'success' => 'Data Jaringan Troubleshoot Berhasil Ditambahkan'
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
        $jaringan_t = JaringanT::findOrFail($id);
        return view('troubleshoot/jaringant.edit', compact('jaringan_t'));
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

        $jaringan_t = JaringanT::findOrFail($id);

        $jaringan_t->update([
            'unit' => $request->unit,
            'id' => $request->id,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
            'input_form' => $request->input_form
        ]);

        if ($jaringan_t) {
            return redirect()
                ->route('jaringant.index')
                ->with([
                    'success' => 'Data Jaringan Troubleshoot berhasil Di ubah'
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
        $jaringan_t = JaringanT::findOrFail($id);
        $jaringan_t->delete();

        if ($jaringan_t) {
            return redirect()
                ->route('jaringant.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('jaringant.index')
                ->with([
                    'error' => 'Data Gagal Dihapus'
                ]);
        }
    }
}
