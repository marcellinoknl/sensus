<?php

namespace App\Http\Controllers\Pages;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\head_of_family;
use App\Models\member_of_family;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    public function index()
    {
        $familyMembers = member_of_family::all();

        return view('pages.keluarga.memberfamily.index', compact('familyMembers'));
    }

    public function add()
{
    $headFamilyMembers = head_of_family::all();
    
    return view('pages.keluarga.memberfamily.add', compact('headFamilyMembers'));
}


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'head_of_family_id' => 'required|integer', // Assuming it's an integer, adjust as needed
            'NIK' => 'required|integer',
            'address' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'last_education' => 'required|string|max:255',
            'type_of_work' => 'required|string|max:255',
            'etnic' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:Male,Female,Other',
            'religion' => 'required|string|max:255',
            'relationship_status_in_the_family' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'marital_status' => 'required|string|max:255',
        ]);

        // Create a new family member instance and set its attributes
        $familyMember = new member_of_family;
        $familyMember->NIK = $request->input('NIK');
        $familyMember->address = $request->input('address');
        $familyMember->full_name = $request->input('full_name');
        $familyMember->last_education = $request->input('last_education');
        $familyMember->type_of_work = $request->input('type_of_work');
        $familyMember->etnic = $request->input('etnic');
        $familyMember->citizenship = $request->input('citizenship');
        $familyMember->age = $request->input('age');
        $familyMember->gender = $request->input('gender');
        $familyMember->religion = $request->input('religion');
        $familyMember->relationship_status_in_the_family = $request->input('relationship_status_in_the_family');
        $familyMember->date_of_birth = $request->input('date_of_birth');
        $familyMember->place_of_birth = $request->input('place_of_birth');
        $familyMember->phone_number = $request->input('phone_number');
        $familyMember->marital_status = $request->input('marital_status');
        $familyMember->head_of_family_id = $request->input('head_of_family_id');

        try {
            // Save the family member instance to the database
            $familyMember->save();

            // Redirect back to the family_members.index route with a success message
            return redirect()->route('familymember.index')->with('success', 'Family member added successfully');
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., database errors
            return redirect()->route('familymember.index')->with('error', 'Failed to add family member');
        }
    }


    public function edit($id)
    {
        $familyMember = member_of_family::findOrFail($id);
        $headofFamilyMembers = head_of_family::all();

        return view('pages.keluarga.memberfamily.edit', compact('familyMember', 'headofFamilyMembers'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'head_of_family_id' => 'required|integer', // Assuming it's an integer, adjust as needed
        'NIK' => 'required|integer',
        'address' => 'required|string|max:255',
        'full_name' => 'required|string|max:255',
        'last_education' => 'required|string|max:255',
        'type_of_work' => 'required|string|max:255',
        'etnic' => 'required|string|max:255',
        'citizenship' => 'required|string|max:255',
        'age' => 'required|integer|min:0',
        'gender' => 'required|in:Male,Female,Other',
        'religion' => 'required|string|max:255',
        'relationship_status_in_the_family' => 'required|string|max:255',
        'date_of_birth' => 'required|date',
        'place_of_birth' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'marital_status' => 'required|string|max:255',
    ]);

    $familyMember = member_of_family::findOrFail($id);
    $familyMember->update($request->all());

    return redirect()->route('familymember.index', $familyMember->head_of_family_id)->with('success', 'Family member updated successfully');
}

    public function destroy($id)
    {
        $familyMember = member_of_family::findOrFail($id);
        $familyMember->delete();

        return redirect()->route('familymember.index')->with('success', 'Family member deleted successfully');
    }
}
