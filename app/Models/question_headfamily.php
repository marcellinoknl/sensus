<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_headfamily extends Model
{
    use HasFactory;

    //table name
    protected $table = 'question_headfamilies';

    //primary key
    protected $primaryKey = 'id';

    protected $fillable = [
        'head_of_family_id',
        'question_id',
        'answer',
    ];

    public function headOfFamily()
    {
        return $this->belongsTo(HeadOfFamily::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
