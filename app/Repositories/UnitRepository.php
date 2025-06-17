<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Models\Guest;

class UnitRepository
{
    public function getAll()
    {
        return Unit::all();
    }

    public function find($id)
    {
        return Unit::findOrFail($id);
    }

    public function create(array $data)
    {
        return Unit::create($data);
    }

    public function getGuestByUnit($unitId)
    {
        return Unit::with('guests')->findOrFail($unitId)->guest;
    }
}
