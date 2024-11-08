<?php

namespace App\Http\Requests\Api\Reimbursement;

use App\Enums\Kategori;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tanggal'=>'nullable',
            'kategori'=>['nullable', new Enum(Kategori::class)],
            'deskripsi'=>'nullable',
            'jumlah'=>'nullable',
            'status'=>['required', new Enum(Status::class)],
            'tanggal_approval'=>'nullable',
            'approval_by'=>'nullable',
        ];
    }
}
