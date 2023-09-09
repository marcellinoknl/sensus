<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator class
class DesaController extends Controller
{
    
'    public function index()
    {
        $villages = village::all(); // Fetch all villages from the database
        
        return view('pages.desa.index', compact('villages'));
    }
    '

    public function add()
    {
        return view('pages.desa.add')
            ->with('success', 'Data Desa Berhasil Ditambahkan'); // Add this line to flash the success message
    }
    
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'village_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('villages.add') // Redirect back to the form page
                ->withErrors($validator) // Pass the validation errors to the view
                ->withInput(); // Preserve the old input data
        }
    
        // If validation passes, create the Village and redirect
        Village::create([
            'village_name' => $request->input('village_name'),
            'address' => $request->input('address'),
        ]);
    
        return redirect()
            ->route('desa') // You can redirect to any other route after successful submission
            ->with('success', 'Data Desa Berhasil Ditambahkan');
    }

    public function edit($villages)
    {
        $villageData = Village::find($villages); // Retrieve the village data
    
        return view('pages.desa.edit', compact('villageData'))
            ->with('success', 'Data Desa edited successfully'); // Add this line to flash the success message
    }
    
    public function update(Request $request, Village $village)
{
    $validatedData = $request->validate([
        'village_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);

    $village->update($validatedData);


    return redirect()->route('desa')->with('success', 'Data Desa Berhasil Diedit');
}


    public function destroy(Village $village)
    {
        $village->delete();

        return redirect()->back()->with('danger', 'Data Desa Berhasil Dihapus');

    }
}
