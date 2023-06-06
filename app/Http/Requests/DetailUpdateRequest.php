<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;

class DetailUpdateRequest extends FormRequest
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
        $profile = Profile::where('user_id', auth()->id())->first();
        return [
            'environment_plan' => 'required',
            'environment_plan_date' => 'required_if:environment_plan,1',
            'industry_reg' => 'required',
            'industry_reg_no' => 'required_if:industry_reg,1',
            'industry_reg_date' => 'required_if:industry_reg,1',
            'construct_BBC' => 'required',
            'fire_insurance' => 'required',
            'fire_insurance_com' => 'required_if:fire_insurance,1',
            'municipal_business_license' => 'required',
            'export_import_license' => 'required',
            'fire_recommendation' => 'required',
            'commercial_last_date' => $profile->commercial_date ? 'required' : '',
            'export_price' => $profile->commercial_date ? 'required' : '',
            'import_price' => $profile->commercial_date ? 'required' : '',
            'business_system_type' => $profile->commercial_date ? 'required' : '',
            'export_type' => $profile->commercial_date ? 'required' : '',
            'received_letter_brandname' => $profile->commercial_date ? 'required' : '',
            'commercial_company_name' => $profile->commercial_date ? 'required' : '',
            'commercial_country_id' => $profile->commercial_date ? 'required' : '',
            'currency_id' => $profile->commercial_date ? 'required' : '',
            'local_labour_male' => 'required',
            'local_labour_female' => 'required',
            'foreign_director_male' => 'required',
            'foreign_director_female' => 'required',
            'foreign_technician_male' => 'required',
            'foreign_technician_female' => 'required',
            'foreign_dependent_male' => 'required',
            'foreign_dependent_female' => 'required',
        ];
    }
}
