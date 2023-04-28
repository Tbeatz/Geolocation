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
            'commercial_date'=>'required',
            'office_address'=>'required',
            'permit_no'=>'required',
            'permit_date'=>'required',
            'local_invest'=>'required',
            'foreign_invest'=>'required',
            'permit_type_id'=>'required',
            'form_of_invest_id'=>'required',
        ];
    }
}
