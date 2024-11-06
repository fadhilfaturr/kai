<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $software = Software::all();
        //return $maintenance;
     return view('layanan.index', compact('software'));
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

        $software = Software::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software) {
            return redirect()
                ->route('layanan.index')
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
        $software = Software::findOrFail($id);
        return view('layanan.edit', compact('software'));
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

        $software = Software::findOrFail($id);

        $software->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software) {
            return redirect()
                ->route('layanan.index')
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
        $software = Software::findOrFail($id);
        $software->delete();

        if ($software) {
            return redirect()
                ->route('layanan.index')
                ->with([
                    'success' => 'Data software Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('layanan.index')
                ->with([
                    'error' => 'Data software Gagal Dihapus'
                ]);
        }
    }
}
