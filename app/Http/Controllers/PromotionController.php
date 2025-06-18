<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\PromotionService;

class PromotionController extends Controller
{
    //
    private $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    public function index()
    {
        return response()->json($this->promotionService->getAll());
    }

    public function storeByUnit(Request $request, Unit $unit)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
        ]);

        $data['unit_id'] = $unit->id;

        $promotion = $this->promotionService->store($data);

        return response()->json([
            'message' => 'Gambar Promosi berhasil diisi',
            'data' => $promotion
        ], 201);
    }
}
