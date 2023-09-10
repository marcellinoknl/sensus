<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_of_family extends Model
{
    use HasFactory;
    protected $table = 'member_of_families';
    protected $primaryKey = 'id';
    protected $fillable = [
        'head_of_family_id',
        'NIK',
        'address',
        'full_name',
        'last_education',
        'type_of_work',
        'etnic',
        'citizenship',
        'age',
        'gender',
        'religion',
        'relationship_status_in_the_family',
        'date_of_birth',
        'place_of_birth',
        'phone_number',
        'marital_status',
    ];
    public function head_of_family()
    {
        return $this->belongsTo(head_of_family::class);
    }
    
}
