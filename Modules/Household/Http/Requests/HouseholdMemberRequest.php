<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdMemberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_MEMBER_PNAME' => ['required'],
            'HOUSEHOLD_MEMBER_NAME' => ['required'],
            'HOUSEHOLD_MEMBER_SURNAME' => ['required'],
            'HOUSEHOLD_MEMBER_DOB' => ['required'],
            'HOUSEHOLD_MEMBER_HEIGHT' => ['required'],
            'HOUSEHOLD_MEMBER_WEIGHT' => ['required'],
            'HOUSEHOLD_MEMBER_NATIONALITY' => ['required'],
            'HOUSEHOLD_MEMBER_RELIGION' => ['required'],
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
            'HOUSEHOLD_MEMBER_PNAME.required' => '',
            'HOUSEHOLD_MEMBER_NAME.required' => '',
            'HOUSEHOLD_MEMBER_SURNAME.required' => '',
            'HOUSEHOLD_MEMBER_DOB.required' => '',
            'HOUSEHOLD_MEMBER_HEIGHT.required' => '',
            'HOUSEHOLD_MEMBER_WEIGHT.required' => '',
            'HOUSEHOLD_MEMBER_NATIONALITY.required' => '',
            'HOUSEHOLD_MEMBER_RELIGION.required' => '',
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
