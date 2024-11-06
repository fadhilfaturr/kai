<?php

namespace App\Http\Controllers;

use App\Models\HardwareM;
use Illuminate\Http\Request;

class HardMController extends Controller
{
    public function index()
    {
        $hardware_m = HardwareM::all();
        //return $maintenance;
     return view('maintenance/hardwarem.index', compact('hardware_m'));
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

        $hardware_m = HardwareM::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,

        ]);

        if ($hardware_m) {
            return redirect()
                ->route('hardwarem.index')
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
        $hardware_m = HardwareM::findOrFail($id);
        return view('maintenance/hardwarem.edit', compact('hardware_m'));
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

        $hardware_m = HardwareM::findOrFail($id);

        $hardware_m->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($hardware_m) {
            return redirect()
                ->route('hardwarem.index')
                ->with([
                    'success' => 'Data Hardware Maintenance berhasil Di ubah'
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
        $hardware_m = HardwareM::findOrFail($id);
        $hardware_m->delete();

        if ($hardware_m) {
            return redirect()
                ->route('hardwarem.index')
                ->with([
                    'success' => 'Data Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('hardwarem.index')
                ->with([
                    'error' => 'Data Gagal Dihapus'
                ]);
        }
    }
}
