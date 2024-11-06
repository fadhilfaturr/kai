<?php

namespace App\Http\Controllers;

use App\Models\SoftwareL;
use Illuminate\Http\Request;

class SoftLController extends Controller
{
    public function index()
    {
        $software_l = SoftwareL::all();
        //return $maintenance;
     return view('layanan/softwarel.index', compact('software_l'));
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

        $software_l = SoftwareL::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software_l) {
            return redirect()
                ->route('softwarel.index')
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
        $software_l = SoftwareL::findOrFail($id);
        return view('layanan/softwarel.edit', compact('software_l'));
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

        $software_l = SoftwareL::findOrFail($id);

        $software_l->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software_l) {
            return redirect()
                ->route('softwarel.index')
                ->with([
                    'success' => 'Data Layanan Software berhasil Di ubah'
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
        $software_l = SoftwareL::findOrFail($id);
        $software_l->delete();

        if ($software_l) {
            return redirect()
                ->route('softwarel.index')
                ->with([
                    'success' => 'Data software Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('softwarel.index')
                ->with([
                    'error' => 'Data software Gagal Dihapus'
                ]);
        }
    }
}
