<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class head_of_family extends Model
{
    use HasFactory;

    protected $table = 'head_of_families';
    protected $primaryKey = 'id';

    //fillable
    protected $fillable = [
        'census_id',
        'village_id',
        'number_of_family_card',
        'nama_keluarga',
    ];

    public function census()
    {
        return $this->belongsTo(census::class);
    }
    //make relation with village
    public function village()
    {
        return $this->belongsTo(village::class);
    }

    public function member_of_family()
    {
        return $this->hasMany(member_of_family::class);
    }

}
