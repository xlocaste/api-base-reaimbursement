<?php

namespace App\Http\Controllers\Api;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReimbursementResource;
use App\Http\Requests\Api\Reimbursement\StoreRequest;
use App\Http\Requests\Api\Reimbursement\UpdateRequest;
use App\Models\Reimbursement;
use Carbon\Carbon;

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
            'status' => $request->status ?? Status::Menunggu->value,

        ]);

        return (new ReimbursementResource($reimbursement))->additional([
            'message' => 'Berhasil mengajukan reimbursement'
        ]);
    }

    public function update(UpdateRequest $request, Reimbursement $reimbursement)
    {
        $user = auth()->user();

        $reimbursement->update([
            'status' => $request->status,
            'tanggal_approval' => $request->tanggal_approval ?? Carbon::now(),
            'approval_by' => $user->id,
        ]);

        return (new ReimbursementResource($reimbursement))->additional([
            'message' => 'Berhasil approval reimbursement'
        ]);
    }

    public function destroy(Reimbursement $reimbursement)
    {
        $reimbursement->delete();

        return response()->json([
            'message' => 'Berhasil menghapus data reimbursement'
        ]);
    }

    public function show($reimbursement)
    {
        $reimbursement = Reimbursement::findOrFail($reimbursement);

        return (new ReimbursementResource($reimbursement))->additional([
            'message' => 'Data reimbursement berhasil di dapatkan'
        ]);
    }

}
