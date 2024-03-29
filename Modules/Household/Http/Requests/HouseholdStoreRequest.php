<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'STORE_DATE' => ['required'],
            'STORE_TIME' => ['required'],
            'STORE_TO_TIME' => ['required'],
            'STORE_FORM_ROUND' => ['required'],
            'STORE_FORM_NUMBER' => ['required'],
            'STORE_COLLECTOR' => ['required'],
            'STORE_PERSON.0' => ['required'],
            'HOUSE_ID' => ['required'],
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
            'STORE_DATE.required' => 'โปรดระบุวันที่สอบถาม',
            'STORE_TIME.required' => 'โปรดระบุเวลาเริ่มต้น',
            'STORE_TO_TIME.required' => 'โปรดระบุเวลาสิ้นสุด',
            'STORE_FORM_ROUND.required' => 'โปรดระบุครั้งที่เก็บข้อมูล',
            'STORE_FORM_NUMBER.required' => 'โปรดระบุHC',
            'STORE_COLLECTOR.required' => 'โปรดระบุผู้เก็บข้อมูล',
            'STORE_PERSON.0.required' => 'โปรดระบุผู้ให้ข้อมูลอย่างน้อย 1 คน',
            'HOUSE_ID.required' => 'โปรดระบุครั้งที่เก็บข้อมูล',
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
