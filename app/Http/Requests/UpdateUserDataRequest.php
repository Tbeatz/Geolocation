<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserdataRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'investor_name' => 'required',
            'company_name'=>'required',
            'company_reg_no'=>'required',
            'businesstype_detail'=>'required',
            'business_location'=>'required',
            'geolocation'=>'required|json',
            'permit_no'=>'required',
            'land_area'=>'required',
            'country_id'=>'required',
            'sector_id'=>'required',
        ];
    }
}
