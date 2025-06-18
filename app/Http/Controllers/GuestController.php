<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\GuestService;

class GuestController extends Controller
{
    //
    private $guestService;

    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }

    public function index()
    {
        return response()->json($this->guestService->getAll());
    }

    public function storeByUnit(Request $request, Unit $unit)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'unit_id'=>'required',
        ]);

        $data['unit_id'] = $unit->id;

        $guest = $this->guestService->store($data);

        return response()->json([
            'message' => 'Buku tamu berhasil diisi',
            'data' => $guest
        ], 201);
    }
}
