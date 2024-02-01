<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdEconRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_ECON_INCOME_TYPE.1' => ['required'],
            'HOUSEHOLD_ECON_INCOME_TYPE.2' => ['required'],
            'HOUSEHOLD_ECON_INCOME_TYPE.3' => ['required'],
            'HOUSEHOLD_ECON_INCOME_TYPE.4' => ['required'],
            'HOUSEHOLD_ECON_INCOME_TYPE.5' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.1' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.2' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.3' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.4' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.4' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.6' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.7' => ['required'],
            'HOUSEHOLD_ECON_EXP_SUM.8' => ['required'],
            'HOUSEHOLD_ECON_HOUSE_LIST' => ['required'],
            'HOUSEHOLD_ECON_LAND' => ['required'],
            'HOUSEHOLD_ECON_AREA_LIST' => ['required'],
            'HOUSEHOLD_ECON_EQUIPMENT_TYPE' => ['required'],
            'HOUSEHOLD_ECON_VEHICLE_TYPE' => ['required'],
            'HOUSEHOLD_ECON_COM_DEVICE_TYPE' => ['required'],
            'HOUSEHOLD_ECON_PET_CATEG' => ['required'],
            'HOUSEHOLD_ECON_DEPT_FROM_TYPE' => ['required'],
            'HOUSEHOLD_ECON_SPECIAL_FIN_' => ['required'],
            'HOUSEHOLD_ECON_COMM_BANK_' => ['required'],
            'HOUSEHOLD_ECON_NONBANK_' => ['required'],
            'HOUSEHOLD_ECON_COMMU_FUND_' => ['required'],
            'HOUSEHOLD_ECON_SHARK_LOAN_' => ['required'],
            'HOUSEHOLD_ECON_H_SAVING_' => ['required'],
            'HOUSEHOLD_ECON_OCCUP_PROBLEM_' => ['required'],
            'HOUSEHOLD_ECON_LIVING_PROBLEM_' => ['required'],
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
            'HOUSEHOLD_ECON_INCOME_TYPE.1.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_INCOME_TYPE.2.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_INCOME_TYPE.3.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_INCOME_TYPE.4.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_INCOME_TYPE.5.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_EXP_SUM.1.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.2.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.3.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.4.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.5.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.6.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.7.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_EXP_SUM.8.required' => 'โปรดระบุรายจ่าย',
            'HOUSEHOLD_ECON_HOUSE_LIST.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_LAND.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_AREA_LIST.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_EQUIPMENT_TYPE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_VEHICLE_TYPE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_COM_DEVICE_TYPE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_PET_CATEG.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_DEPT_FROM_TYPE.required' => 'โปรดระบุข้อมูล',
            'HOUSEHOLD_ECON_SPECIAL_FIN_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_COMM_BANK_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_NONBANK_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_COMMU_FUND_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_SHARK_LOAN_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_H_SAVING_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_OCCUP_PROBLEM_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ECON_LIVING_PROBLEM_.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
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
