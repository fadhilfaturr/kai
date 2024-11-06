<?php

namespace App\Http\Controllers;

use App\Models\HardwareL;
use Illuminate\Http\Request;

class HardLController extends Controller
{
    public function index()
    {
        $hardware_l = HardwareL::all();
        //return $maintenance;
     return view('layanan/hardwarel.index', compact('hardware_l'));
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

        $hardware_l = HardwareL::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($hardware_l) {
            return redirect()
                ->route('hardwarel.index')
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
        $hardware_l = HardwareL::findOrFail($id);
        return view('layanan/hardwarel.edit', compact('hardware_l'));
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

        $hardware_l = HardwareL::findOrFail($id);

        $hardware_l->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($hardware_l) {
            return redirect()
                ->route('hardwarel.index')
                ->with([
                    'success' => 'Data Hardware layanan berhasil Di ubah'
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
        $hardware_l = HardwareL::findOrFail($id);
        $hardware_l->delete();

        if ($hardware_l) {
            return redirect()
                ->route('hardwarel.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('hardwarel.index')
                ->with([
                    'error' => 'Data Gagal Dihapus'
                ]);
        }
    }
}
