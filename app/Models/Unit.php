<?php

namespace App\Models;

use App\Models\Guest;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
