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
            'HOUSEHOLD_ECON_GENERAL' => ['required'],
            'HOUSEHOLD_ECON_AGRI' => ['required'],
            'HOUSEHOLD_ECON_LIVESTOCK' => ['required'],
            'HOUSEHOLD_ECON_FISHING' => ['required'],
            'HOUSEHOLD_ECON_OCCU_OTHER' => ['required'],
            'HOUSEHOLD_ECON_CHILD' => ['required'],
            'HOUSEHOLD_ECON_WELFARE' => ['required'],
            'HOUSEHOLD_ECON_OTHER_REVENUE' => ['required'],
            'HOUSEHOLD_ECON_NOTE_REVENUE' => ['required'],
            
            'HOUSEHOLD_ECON_FOOD' => ['required'],
            'HOUSEHOLD_ECON_WATER' => ['required'],
            'HOUSEHOLD_ECON_ELECTRICITY' => ['required'],
            'HOUSEHOLD_ECON_TEL' => ['required'],
            'HOUSEHOLD_ECON_INTERNET' => ['required'],
            'HOUSEHOLD_ECON_STUDY' => ['required'],
            'HOUSEHOLD_ECON_NURSE' => ['required'],
            'HOUSEHOLD_ECON_INSURANCE' => ['required'],
            'HOUSEHOLD_ECON_SOCIETY' => ['required'],
            'HOUSEHOLD_ECON_TRAVEL' => ['required'],
            'HOUSEHOLD_ECON_RISK' => ['required'],
            'HOUSEHOLD_ECON_ALCOHOL' => ['required'],
            'HOUSEHOLD_ECON_DEBT' => ['required'],
            'HOUSEHOLD_ECON_OTHER_EXPENSES' => ['required'],
            'HOUSEHOLD_ECON_NOTE_EXPENSES' => ['required'],
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
            'HOUSEHOLD_ECON_GENERAL.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_AGRI.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_LIVESTOCK.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_FISHING.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_OCCU_OTHER.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_CHILD.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_WELFARE.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_OTHER_REVENUE.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_NOTE_REVENUE.required' => 'โปรดระบุรายรับ',

            
            'HOUSEHOLD_ECON_FOOD.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_WATER.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_ELECTRICITY.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_TEL.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_INTERNET.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_STUDY.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_NURSE.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_INSURANCE.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_SOCIETY.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_TRAVEL.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_RISK.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_ALCOHOL.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_DEBT.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_OTHER_EXPENSES.required' => 'โปรดระบุรายรับ',
            'HOUSEHOLD_ECON_NOTE_EXPENSES.required' => 'โปรดระบุรายรับ',

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
