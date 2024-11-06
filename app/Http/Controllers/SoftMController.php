<?php

namespace App\Http\Controllers;

use App\Models\SoftwareM;
use Illuminate\Http\Request;

class SoftMController extends Controller
{
    public function index()
    {
        $software_m = SoftwareM::all();
        //return $maintenance;
     return view('maintenance/softwarem.index', compact('software_m'));
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

        $software_m = SoftwareM::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software_m) {
            return redirect()
                ->route('softwarem.index')
                ->with([
                    'success' => 'Data Software Berhasil Ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Software Gagal Menambahkan'
                ]);
        }
    }

       public function edit($id)
    {
        $software_m = SoftwareM::findOrFail($id);
        return view('maintenance/softwarem.edit', compact('software_m'));
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

        $software_m = SoftwareM::findOrFail($id);

        $software_m->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_realisasi' => $request->tanggal_realisasi,
        ]);

        if ($software_m) {
            return redirect()
                ->route('softwarem.index')
                ->with([
                    'success' => 'Data Maintenance Software berhasil Di ubah'
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
        $software_m = SoftwareM::findOrFail($id);
        $software_m->delete();

        if ($software_m) {
            return redirect()
                ->route('softwarem.index')
                ->with([
                    'success' => 'Data software Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('softwarem.index')
                ->with([
                    'error' => 'Data software Gagal Dihapus'
                ]);
        }
    }
}
