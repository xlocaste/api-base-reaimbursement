<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReimbursementResource;
use App\Http\Requests\Api\Reimbursement\StoreRequest;
use App\Http\Requests\Api\Reimbursement\UpdateRequest;
use App\Models\Reimbursement;

class ReimbursementController extends Controller
{
    public function index()
    {
        $reimbursements = Reimbursement::all();

        return ReimbursementResource::collection($reimbursements);
    }

    public function store(StoreRequest $request )
    {
        $user = auth()->user();

        $reimbursement = Reimbursement::create([
            'user_id' => $user->id,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'tanggal_approval' => $request->tanggal_approval,
            'approval_by' => $request->approval_by,
        ]);

        return (new ReimbursementResource($reimbursement))->additional([
            'message' => 'Berhasil mengajukan reimbursement'
        ]);
    }
}
