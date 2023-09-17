<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\head_of_family;
use App\Models\question;
use App\Models\question_headfamily;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        $questions = question::all();
        return view('pages.formekonomi.index', compact('questions'));
    }

    //make add
    public function add()
    {
        return view('pages.formekonomi.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'input_type' => 'required|in:isian,dropdown',
            'options' => 'nullable|array', // Validate that options is an array
        ]);
    
        $question = new question;
        $question->question = $request->question;
        $question->input_type = $request->input('input_type');
    
        // Process and store options as comma-separated values for dropdown questions
        if ($question->input_type === 'dropdown') {
            $options = $request->input('options', []);
            $question->options = json_encode($options); // Serialize options to JSON
        } else {
            // If the input type is not "dropdown," make sure to clear the options field
            $question->options = null;
        }
    
        $question->save();
    
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan');
    }
    
    

    //make edit
    public function edit($id)
    {
        $question = question::findOrFail($id);
        return view('pages.formekonomi.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'input_type' => 'required|in:isian,dropdown',
            'options' => 'nullable|array',
            'deleted_options' => 'nullable|array',
        ]);
    
        $question = question::find($id);
        $question->question = $request->question;
        $question->input_type = $request->input_type;
    
        // If the input type is "dropdown," serialize the options array to JSON
        if ($question->input_type === 'dropdown') {
            $options = $request->input('options', []);
            $question->options = json_encode($options);
        } else {
            // If the input type is not "dropdown," make sure to clear the options field
            $question->options = null;
        }
    
        $question->update();
    
        // Handle deletion of options
        if ($request->has('deleted_options')) {
            $deletedOptions = $request->input('deleted_options');
            
            // Assuming that options are stored in a separate table called "question_options"
            // You can adjust this part based on your actual database structure
            foreach ($deletedOptions as $deletedOptionId) {
                // Find and delete the option from the "question_options" table
                $option = question::find($deletedOptionId);
                if ($option) {
                    $option->delete();
                }
            }
        }
    
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diubah');
    }       
    
    public function destroy($id)
    {
        $question = question::find($id);
        $question->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus');
    }

    //kuesioner find id from head of family to store data to question_headfamilies
    public function kuesioner($headfamily)
    {
        try {
            $question = question::all();
            $familyName = head_of_family::findOrFail($headfamily); // Retrieve the specific head_of_family record
            return view('pages.kuesioner.add', compact('question', 'familyName'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where the resource is not found
            // You can redirect the user or display an error message
            // For example, redirect to a 404 page:
            return abort(404);
        }
    }
    
    public function storeAnswer(Request $request)
{
    $request->validate([
        'headfamily' => 'required|exists:head_of_families,id',
        'answers' => 'required|array',
    ]);

    $headfamilyId = $request->input('headfamily');
    $answers = $request->input('answers');

    foreach ($answers as $questionId => $answer) {
        question_headfamily::create([
            'head_of_family_id' => $headfamilyId,
            'question_id' => $questionId,
            'answer' => $answer,
        ]);
    //set status head_of_family to 1
    $head_of_family = head_of_family::find($headfamilyId);
    $head_of_family->status_sensus = 1;
    $head_of_family->save();

    }

    return redirect()->route('pertanyaan.index')->with('success', 'Jawaban berhasil disimpan');
}
    
    

    
}
