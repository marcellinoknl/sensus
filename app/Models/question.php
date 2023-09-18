<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'question',
    ];

    //relationship with question_head_of_family as the created new table for question and head_of_family
    public function question_head_of_family()
    {
        return $this->hasMany(question_head_of_family::class);
    }

    public function head_of_families()
    {
        return $this->belongsToMany('App\Models\head_of_family', 'question_headfamilies', 'question_id', 'head_of_family_id')
            ->using('App\Models\question_headfamily')
            ->withPivot('answer');
    }
    
}
