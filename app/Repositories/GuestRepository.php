<?php

namespace App\Repositories;

use App\Models\Guest;

class GuestRepository
{
    public function getAll()
    {
        return Guest::with(['unit'])->get();
    }

    public function create(array $data)
    {
        return Guest::create($data);
    }
}