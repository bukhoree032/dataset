<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdMemberGeneralRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_MEMBER_GENERAL_SKILL' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_STATUS' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID' => ['required'],
            'HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP' => ['required'],
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
            'HOUSEHOLD_MEMBER_GENERAL_SKILL.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_STATUS.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
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
