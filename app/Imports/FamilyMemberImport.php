<?php

namespace App\Imports;

use App\Models\member_of_family;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class FamilyMemberImport implements ToModel
{
    public function model(array $row)
    {
        Log::info('Processing row: ' . json_encode($row));
    
        return new member_of_family([
            'head_of_family_id' => $row[0], // Adjust the index as needed
            'NIK' => $row[1],               // Corrected index
            'address' => $row[2],           // Corrected index
            'full_name' => $row[3],         // Corrected index
            'last_education' => $row[4],    // Corrected index
            'type_of_work' => $row[5],       // Corrected index
            'etnic' => $row[6],             // Corrected index
            'citizenship' => $row[7],       // Corrected index
            'age' => $row[8],               // Corrected index
            'gender' => $row[9],            // Corrected index
            'religion' => $row[10],         // Corrected index
            'relationship_status_in_the_family' => $row[11],  // Corrected index
            'date_of_birth' => $row[12],    // Corrected index
            'place_of_birth' => $row[13],   // Corrected index
            'phone_number' => $row[14],     // Corrected index
            'marital_status' => $row[15],   // Corrected index

        ]);
    }
    
}