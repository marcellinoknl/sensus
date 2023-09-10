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


    public function store(Request $request, $head_of_family_id)
{
    $request->validate([
        'head_of_family_id' => 'required|integer', // Assuming it's an integer, adjust as needed
        'NIK' => 'required|regex:/^[0-9]{16}$/',
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

    $data = $request->all();
    $data['head_of_family_id'] = $head_of_family_id;

    member_of_family::create($data);

    return redirect()->route('family_members.index', $head_of_family_id)->with('success', 'Family member added successfully');
}

    public function show($head_of_family_id, $id)
    {
        $familyMember = member_of_family::findOrFail($id);

        return view('family_members.show', compact('familyMember'));
    }

    public function edit($head_of_family_id, $id)
    {
        $familyMember = member_of_family::findOrFail($id);

        return view('family_members.edit', compact('familyMember'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'head_of_family_id' => 'required|integer', // Assuming it's an integer, adjust as needed
        'NIK' => 'required|regex:/^[0-9]{16}$/',
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

    return redirect()->route('family_members.index', $familyMember->head_of_family_id)->with('success', 'Family member updated successfully');
}

    public function destroy($head_of_family_id, $id)
    {
        $familyMember = member_of_family::findOrFail($id);
        $familyMember->delete();

        return redirect()->route('family_members.index', $head_of_family_id)->with('success', 'Family member deleted successfully');
    }
}
