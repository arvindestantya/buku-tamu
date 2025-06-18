<?php

namespace App\Repositories;

use App\Models\Promotion;

class PromotionRepository
{
    public function getAll()
    {
        return Promotion::with(['unit'])->get();
    }

    public function create(array $data)
    {
        return Promotion::create($data);
    }

    
}