<?php

namespace App\Http\Controllers;

use App\Models\HardwareT;
use Illuminate\Http\Request;

class HardTController extends Controller
{
    public function index()
    {
        $hardware_t = HardwareT::all();
        //return $maintenance;
     return view('troubleshoot/hardwaret.index', compact('hardware_t'));
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

        $hardware_t = HardwareT::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,

        ]);
        
        if ($hardware_t) {
            return redirect()
                ->route('hardwaret.index')
                ->with([
                    'success' => 'Data Troubleshoot Berhasil Ditambahkan'
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
        $hardware_t = HardwareT::findOrFail($id);
        return view('hardwaret.edit', compact('hardware_t'));
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

        $hardware_t = HardwareT::findOrFail($id);

        $hardware_t->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($hardware_t) {
            return redirect()
                ->route('hardwaret.index')
                ->with([
                    'success' => 'Data Troubleshoot berhasil Di ubah'
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
        $hardware_l = HardwareT::findOrFail($id);
        $hardware_l->delete();

        if ($hardware_l) {
            return redirect()
                ->route('hardwaret.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('hardwaret.index')
                ->with([
                    'error' => 'Data Gagal Dihapus'
                ]);
        }
    }
}
