<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadFamilyController extends Controller
{
    //mmake index function
    public function index()
    {
        return view('pages.keluarga.headfamily.index');
    }
    public function add()
    {
        return view('pages.keluarga.headfamily.add');
    }
    public function store(Request $request)
    {

        return redirect()
            ->route('headfamily') // You can redirect to any other route after successful submission
            ->with('success', 'Data Kepala Keluarga Berhasil Ditambahkan');
    }
    
}
