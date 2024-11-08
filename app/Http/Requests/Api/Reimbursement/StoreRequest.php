<?php

namespace App\Http\Requests\Api\Reimbursement;

use App\Enums\Kategori;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreRequest extends FormRequest
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
            'tanggal'=>'required',
            'kategori'=>['required', new Enum(Kategori::class)],
            'deskripsi'=>'nullable',
            'jumlah'=>'required',
            'status'=>['required', new Enum(Status::class)],
            'tanggal_approval'=>['nullable', 'date'],
            'approval_by'=>'nullable',
        ];
    }
}
