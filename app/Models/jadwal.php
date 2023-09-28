<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $primaryKey = 'id';

    //fillable as migration
    protected $fillable = [
        'village_id',
        'census_name',
        'schedule',
    ];

    public function head_of_family()
    {
        return $this->hasMany(head_of_family::class);
    }

    public function village()
    {
        return $this->belongsTo(village::class);
    }
}

