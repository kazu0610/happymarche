<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ['image', 'mimes:jpg,png,jpeg,gif', 'max:2048'],
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'tel' => ['numeric', 'digits_between:10,11', 'nullable'],
            'postcode' => ['numeric', 'digits:7', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
            'area' => ['string', 'max:255', 'nullable'],
        ];
    }
}
