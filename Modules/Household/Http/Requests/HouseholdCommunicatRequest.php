<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdCommunicatRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_COMUNICAT_OCCUP_ID' => ['required'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'HOUSEHOLD_COMUNICAT_OCCUP_ID.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
