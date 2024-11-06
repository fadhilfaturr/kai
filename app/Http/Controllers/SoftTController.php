<?php

namespace App\Http\Controllers;

use App\Models\SoftwareT;
use Illuminate\Http\Request;

class SoftTController extends Controller
{
    public function index()
    {
        $software_t = SoftwareT::all();
        //return $maintenance;
     return view('troubleshoot/softwaret.index', compact('software_t'));
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

        $software_t = SoftwareT::create([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software_t) {
            return redirect()
                ->route('softwaret.index')
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
        $software_t = SoftwareT::findOrFail($id);
        return view('troubleshoot/softwaret.edit', compact('software_t'));
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

        $software_t = SoftwareT::findOrFail($id);

        $software_t->update([
            'unit' => $request->unit,
            'inventaris' => $request->inventaris,
            'user' => $request->user,
            'tanggal_rencana' => $request->tanggal_rencana,
            'tanggal_relasasi' => $request->tanggal_relasasi,
        ]);

        if ($software_t) {
            return redirect()
                ->route('softwaret.index')
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
        $software_t = SoftwareT::findOrFail($id);
        $software_t->delete();

        if ($software_t) {
            return redirect()
                ->route('softwaret.index')
                ->with([
                    'success' => 'Data software Berhasil Dihapus'
                ]);
        } else {
            return redirect()
                ->route('softwaret.index')
                ->with([
                    'error' => 'Data software Gagal Dihapus'
                ]);
        }
    }
}
