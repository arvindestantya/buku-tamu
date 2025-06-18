<?php

namespace App\Services;

use App\Models\Unit;
use App\Repositories\UnitRepository;

class UnitService
{
    private $unitRepository;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function getAll()
    {
        return $this->unitRepository->getAll();
    }

    public function getById($id)
    {
        return Unit::with(['guests', 'promotions'])->find($id);
    }

    public function store (array $data)
    {
        return $this->unitRepository->create($data);
    }

    public function getGuest($unitId)
    {
        return $this->unitRepository->getGuestByUnit($unitId);
    }
    
    public function getPromotion($unitId)
    {
        return $this->unitRepository->getPromotionByUnit($unitId);
    }
}