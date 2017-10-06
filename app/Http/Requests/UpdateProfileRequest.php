<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Utilities\Country;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avatar'=>'mimes:jpeg,bmp,png',
            'birthday'=>'nullable|date',
            'gender'=>'bool',
            'name'=>'required|min:3',
            'description'=>'max:255',
            'country'=>[Rule::in(Country::all())]
        ];
    }
}
