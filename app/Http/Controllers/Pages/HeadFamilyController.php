<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\census;
use App\Models\head_of_family;
use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'number_of_family_card' => 'required|string|unique:head_of_families,number_of_family_card',
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
            'number_of_family_card' => 'required|string|unique:head_of_families,number_of_family_card',
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
    
    //make detail function
    public function detail($id)    {
        // Retrieve the head of family without related data
        $head_of_family = head_of_family::findOrFail($id);

        // Retrieve the questions and answers related to this head_of_family
        $questions_and_answers = DB::table('question_headfamilies')
                                    ->where('question_headfamilies.head_of_family_id', $id)
                                    ->join('questions', 'question_headfamilies.question_id', '=', 'questions.id')
                                    ->select('questions.question', 'question_headfamilies.answer')
                                    ->get();

        // Check if family members are loaded
        if ($head_of_family->relationLoaded('member_of_family')) {
            // The family members relationship is loaded
        } else {
            // The family members relationship is not loaded
        }

        return view('pages.kuesioner.detail', compact('head_of_family', 'questions_and_answers'));
        }
     
    
}
