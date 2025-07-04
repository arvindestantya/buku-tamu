<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\UnitService;

class UnitController extends Controller
{
    //
    private $unitService;

    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    public function index()
    {
        return response()->json($this->unitService->getAll());
    }

    public function show($id)
    {
        $unit = $this->unitService->getById($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        return response()->json($unit);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        return response()->json($this->unitService->store($data), 201);
    }

    public function guests($id)
    {
        $unit = Unit::with('guests')->findOrFail($id);
        return response()->json($unit->guests);
    }

    public function promotions($id)
    {
        $unit = Unit::with('promotions')->findOrFail($id);
        return response()->json($unit->promotions);
    }
}
