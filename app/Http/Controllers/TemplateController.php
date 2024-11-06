<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;
use Illuminate\Database\Eloquent\Model;

class TemplateController extends Controller
{
    public function index() {
        $hardware = Hardware::all()->count();
        return view('template.index')->with('hardware', $hardware);
        // return view('template.layout');
    }
}
