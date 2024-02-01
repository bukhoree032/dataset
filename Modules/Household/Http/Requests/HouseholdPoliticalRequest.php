<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdPoliticalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_POLITICAL_COM_ELEC' => ['required'],
            'HOUSEHOLD_POLITICAL_HH_CONFLICT' => ['required'],
            'HOUSEHOLD_POLITICAL_CONFLICT_OTHER' => ['required'],
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
            'HOUSEHOLD_POLITICAL_COM_ELEC.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_POLITICAL_HH_CONFLICT.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_POLITICAL_CONFLICT_OTHER.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
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
