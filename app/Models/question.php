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



}
