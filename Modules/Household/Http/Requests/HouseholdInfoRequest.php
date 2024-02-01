<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_INFO_PROVINCE' => ['required'],
            'HOUSEHOLD_INFO_AMPHURE' => ['required'],
            'HOUSEHOLD_INFO_DISTRICT' => ['required'],
            'HOUSEHOLD_INFO_MOO' => ['required'],
            'HOUSEHOLD_INFO_VIL_NAME' => ['required'],
            'HOUSEHOLD_INFO_LOCAL_LAT' => ['required'],
            'HOUSEHOLD_INFO_LOCAL_LONG' => ['required'],
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
            'HOUSEHOLD_INFO_PROVINCE.required' => 'โปรดระบุจังหวัด',
            'HOUSEHOLD_INFO_AMPHURE.required' => 'โปรดระบุอำเภอ',
            'HOUSEHOLD_INFO_DISTRICT.required' => 'โปรดระบุตำบล',
            'HOUSEHOLD_INFO_MOO.required' => 'โปรดระบุหมู่',
            'HOUSEHOLD_INFO_VIL_NAME.required' => 'โปรดระบุชื่อหมู่บ้าน',
            'HOUSEHOLD_INFO_LOCAL_LAT.required' => 'โปรดระบุละติจูด',
            'HOUSEHOLD_INFO_LOCAL_LONG.required' => 'โปรดระบุลองติจูด',
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
