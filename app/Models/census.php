<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class census extends Model
{
    use HasFactory;
    protected $table = 'censuses';
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
