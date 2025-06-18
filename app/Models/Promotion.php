<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'unit_id',
        'name',
        'photo',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function getPhotoAttribute($value)
    {
        if (!$value){
            return null; // no image available
        }

        return url(Storage::url($value));
    }
}
