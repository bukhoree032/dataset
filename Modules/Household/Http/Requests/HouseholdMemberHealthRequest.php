<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdMemberHealthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_MEMBER_HEALTH_RISK' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_HCARE' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_EMERGENCY' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_CARER_' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_W_CARE' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_P_CARE' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_ILLNESS' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_BENEFIT' => ['required'],
            'HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE' => ['required'],
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
            'HOUSEHOLD_MEMBER_HEALTH_RISK.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_HCARE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_EMERGENCY.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_CARER_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_W_CARE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_P_CARE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_ILLNESS.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_BENEFIT.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
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
