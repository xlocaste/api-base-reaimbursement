<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    use HasFactory;

    protected $table = "reimbursements";

    protected $fillable = [
        'user_id',
        'tanggal',
        'kategori',
        'deskripsi',
        'jumlah',
        'status',
        'tanggal_approval',
        'approval_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
