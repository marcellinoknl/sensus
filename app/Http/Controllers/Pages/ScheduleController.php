<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\jadwal;
use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = jadwal::all(); // Fetch all villages from the database
        
        return view('pages.schedule.index', compact('schedules'));
    }

    //make function for schedule using model : census
    public function add()
    {
        $villages = village::all();
        return view('pages.schedule.add',compact('villages'))
            ->with('success', 'Data Schedule Berhasil Ditambahkan'); // Add this line to flash the success message
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|integer',
            'census_name' => 'required|string|max:255',
            'schedule' => 'required|date',  // changed validation to date
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('schedule.add') // Redirect back to the form page
                ->withErrors($validator) // Pass the validation errors to the view
                ->withInput(); // Preserve the old input data
        }
    
        // Parse and format the schedule date
        $scheduleDate = $request->input('schedule');
        $formattedDate = Carbon::parse($scheduleDate)->format('d-m-Y'); 
    
        // If validation passes, create the Village and redirect
        jadwal::create([
            'village_id' => $request->input('village_id'),
            'census_name' => $request->input('census_name'),
            'schedule' => $formattedDate,  // Save the formatted date
        ]);
    
        return redirect()
            ->route('schedule') // You can redirect to any other route after successful submission
            ->with('success', 'Data Schedule Berhasil Ditambahkan');
    }

    public function edit($schedules)
    {
        $villages = Village::all();
        $scheduleData = jadwal::find($schedules); // Retrieve the schedule data

        if (!$scheduleData) {
            return redirect()->route('schedule')->with('error', 'Schedule not found');
        }

        return view('pages.schedule.edit', compact('scheduleData','villages'));
    }
    

    public function update(Request $request, $schedules)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'village_id' => 'required|integer',
            'census_name' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('schedule.edit', $schedules) // Redirect back to the form page
                ->withErrors($validator) // Pass the validation errors to the view
                ->withInput(); // Preserve the old input data
        }
    
        // If validation passes, update the village and redirect
        $scheduleData = jadwal::find($schedules);
        $scheduleData->update([
            'village_id' => $request->input('village_id'),
            'census_name' => $request->input('census_name'),
            'schedule' => $request->input('schedule'),
        ]);
    
        return redirect()
            ->route('schedule') // You can redirect to any other route after successful submission
            ->with('success', 'Data Schedule Berhasil Diubah');
    }

    public function destroy($schedules)
    {
        $scheduleData = jadwal::find($schedules); // Retrieve the village data
        $scheduleData->delete(); // Delete the village data

        return redirect()
            ->route('schedule') // You can redirect to any other route after successful deletion
            ->with('success', 'Data Schedule Berhasil Dihapus');
    }

    
}
