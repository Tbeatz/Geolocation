<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestorLocationUpdateRequest extends FormRequest
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
            'sector_id'=>'required',
            'country_id'=>'required',
            'region_id'=>'required',
            'district_id'=>'required',
            'township_id'=>'required',
            'land_area'=>'required',
            'land_plot_no'=>'required',
            'land_measure_no'=>'required',
            'street_no'=>'required',
            'street_name'=>'required',
            'businesszone_id'=>'required',
            'land_lease_contract_stamp'=>'required',
            'land_lease_contract_register'=>'required',
            'landtype_id'=>'',
            'geolocation'=>'required|json',
            'type'=>'required',
            'cover'=>'image',
        ];
    }
}
