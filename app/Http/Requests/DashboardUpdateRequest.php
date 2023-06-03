<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DashboardUpdateRequest extends FormRequest
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
            'company_name'=>'required',
            'company_reg_no'=>'required',
            'company_reg_date'=>'required',
            'permit_no'=>'required',
            'permit_date'=>'required',
            'local_invest'=>'required',
            'foreign_invest'=>'required',
            'businesstype_detail'=>'required',
            'permit_type_id'=>'required',
            'form_of_invest_id'=>'required',
            'investor_name' => 'required',
            'investor_phone' => 'required',
            'investor_email' => 'required',
            'hr_name' => 'required',
            'hr_phone' => 'required',
        ];
    }
}
