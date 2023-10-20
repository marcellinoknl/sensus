<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    use HasFactory;
    protected $table = 'villages';
    protected $primaryKey = 'id';

    //fillable
    protected $fillable = [
        'village_name',
        'address',
    ];

    public function head_of_family()
    {
        return $this->hasMany(head_of_family::class);
    }

    public function census()
    {
        return $this->hasMany(census::class);
    }
}
