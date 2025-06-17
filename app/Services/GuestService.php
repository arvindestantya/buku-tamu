<?php

namespace App\Services;

use App\Repositories\GuestRepository;

class GuestService
{
    private $guestRepository;

    public function __construct(GuestRepository $guestRepository)
    {
        $this->guestRepository = $guestRepository;
    }

    public function getAll()
    {
        return $this->guestRepository->getAll();
    }

    public function store (array $data)
    {
        return $this->guestRepository->create($data);
    }
}