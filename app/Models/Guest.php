<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'unit_id',
        'name',
        'no_handphone',
        'email',
        'category',
        'purpose',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
