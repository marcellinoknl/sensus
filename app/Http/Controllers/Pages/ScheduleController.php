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
            'schedule' => 'required|date',
            'schedule_end' => 'required|date',
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
        $formattedDate = Carbon::parse($scheduleDate)->format('Y-m-d'); 
        //schedule end
        $scheduleDateEnd = $request->input('schedule_end');
        $formattedDateEnd = Carbon::parse($scheduleDateEnd)->format('Y-m-d');

        // If validation passes, create the Village and redirect
        jadwal::create([
            'village_id' => $request->input('village_id'),
            'census_name' => $request->input('census_name'),
            'schedule' => $formattedDate,  // Save the formatted date
            'schedule_end' => $formattedDateEnd,
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
            'schedule' => 'required|date',
            'schedule_end' => 'required|date',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()
                ->route('schedule.edit', $schedules) // Redirect back to the form page
                ->withErrors($validator) // Pass the validation errors to the view
                ->withInput(); // Preserve the old input data
        }

        // Parse and format the schedule date
        $scheduleDate = $request->input('schedule');
        $formattedDate = Carbon::parse($scheduleDate)->format('Y-m-d');
        //schedule end
        $scheduleDateEnd = $request->input('schedule_end');
        $formattedDateEnd = Carbon::parse($scheduleDateEnd)->format('Y-m-d');
    
        // If validation passes, update the village and redirect
        $scheduleData = jadwal::find($schedules);
        $scheduleData->update([
            'village_id' => $request->input('village_id'),
            'census_name' => $request->input('census_name'),
            'schedule' => $formattedDate,  // Save the formatted date
            'schedule_end' => $formattedDateEnd,

        ]);
    
        return redirect()
            ->route('schedule') // You can redirect to any other route after successful submission
            ->with('success', 'Data Schedule Berhasil Diubah');
    }

    public function toggleActive($schedules)
    {
        $scheduleData = jadwal::find($schedules);
    
        if (!$scheduleData) {
            return redirect()->route('schedule')->with('error', 'Schedule not found');
        }
    
        // Toggle the status between 0 and 1.
        $scheduleData->status = $scheduleData->status == 0 ? 1 : 0;
        $scheduleData->save();
    
        $message = $scheduleData->status == 1 ? 'Data Schedule Berhasil Dinonaktifkan' : 'Data Schedule Berhasil Diaktifkan';
    
        return redirect()
            ->route('schedule')
            ->with('success', $message);
    }
    

    

    
}
