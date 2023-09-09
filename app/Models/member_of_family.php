<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_of_family extends Model
{
    use HasFactory;
    protected $table = 'member_of_families';
    protected $primaryKey = 'id';

    public function head_of_family()
    {
        return $this->belongsTo(head_of_family::class);
    }
    
}
