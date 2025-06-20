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

    public function guest($id)
    {
       $unit=Unit::where('id',$id)->first();
       
       return view('guest.index',compact('unit'));
    }

    public function formBukuTamu($id){
         $unit=Unit::where('id',$id)->first();
       
       return view('guest.form-buku-tamu',compact('unit'));
    }

    public function storeByUnit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'no_handphone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'unit_id'=>'required|integer|exists:units,id',
        ]);
        $guest = $this->guestService->store($data);
        return response()->json([
            'message' => 'Buku tamu berhasil diisi',
            'data' => $guest
        ], 201);
    }
}
