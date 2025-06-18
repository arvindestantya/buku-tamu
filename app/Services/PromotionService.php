<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use App\Services\PromotionService;
use App\Repositories\PromotionRepository;

class PromotionService
{
    private $promotionRepository;

    public function __construct(PromotionRepository $promotionRepository)
    {
        $this->promotionRepository = $promotionRepository;
    }

    public function getAll()
    {
        return $this->promotionRepository->getAll();
    }

    public function store (array $data)
    {
        if (isset($data['photo']) && $data['photo'] instanceof UploadedFile){
            $data['photo'] = $this->uploadPhoto($data['photo']);
        }
        return $this->promotionRepository->create($data);
    }

    private function uploadPhoto(UploadedFile $photo): string // type hinting
    {
        return $photo->store('promotions', 'public'); // domainkita.com/storage/specialists/namafoto.png
        // return true;
    }
}