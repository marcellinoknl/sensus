<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\census;
use App\Models\head_of_family;
use App\Models\village;
use Illuminate\Http\Request;

class HeadFamilyController extends Controller
{
    //mmake index function
    public function index()
    {
        //show all data
        $head_of_families = head_of_family::all();
        return view('pages.keluarga.headfamily.index', compact('head_of_families'));
    }
    public function add()
    {
        $censuses = census::all(); // Fetch all census data from your model
        $villages = village::all(); // Fetch all village data from your model
    
        return view('pages.keluarga.headfamily.add', compact('censuses', 'villages'));
    }
    
    public function edit($id)
{
    $head_of_family = head_of_family::find($id); // Fetch the specific record to edit
    $censuses = Census::all(); // Fetch all census data from your model
    $villages = Village::all(); // Fetch all village data from your model

    return view('pages.keluarga.headfamily.edit', compact('head_of_family', 'censuses', 'villages'));
}


    //store
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'census_id' => 'required',
            'village_id' => 'required',
            'number_of_family_card' => 'required',
            'nama_keluarga' => 'required',
        ]);

        //store the data
        $head_of_family = new head_of_family();
        $head_of_family->census_id = $request->census_id;
        $head_of_family->village_id = $request->village_id;
        $head_of_family->number_of_family_card = $request->number_of_family_card;
        $head_of_family->nama_keluarga = $request->nama_keluarga;
        $head_of_family->save();

        //redirect to head_of_family index
        return redirect()->route('headfamily');
    }

    //update
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'census_id' => 'required',
            'village_id' => 'required',
            'number_of_family_card' => 'required|numeric', // Ensure it's numeric
            'nama_keluarga' => 'required',
        ]);
    
        // Update the data
        $head_of_family = head_of_family::find($id);
        $head_of_family->census_id = $request->census_id;
        $head_of_family->village_id = $request->village_id;
        $head_of_family->number_of_family_card = $request->number_of_family_card;
        $head_of_family->nama_keluarga = $request->nama_keluarga;
        $head_of_family->save();
    
        // Redirect to the head_of_family index
        return redirect()->route('headfamily');
    }
    
    //delete
    public function destroy($id)
    {
        // Find the record by ID
        $head_of_family = head_of_family::find($id);
    
        // Check if the record exists
        if (!$head_of_family) {
            return redirect()->route('headfamily')->with('error', 'Record not found.');
        }
    
        // Delete the record
        $head_of_family->delete();
    
        // Redirect to the index page with a success message
        return redirect()->route('headfamily')->with('success', 'Record deleted successfully.');
    }
    

    
}
