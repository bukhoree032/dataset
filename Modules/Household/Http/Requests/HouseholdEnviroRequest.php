<?php

namespace Modules\Household\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdEnviroRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'HOUSEHOLD_ENVIR_WLIGHT' => ['required'],
            'HOUSEHOLD_ENVIR_CLEAN' => ['required'],
            'HOUSEHOLD_ENVIR_SAFE' => ['required'],
            'HOUSEHOLD_ENVIR_BIN' => ['required'],
            'HOUSEHOLD_ENVIR_H_ENVI' => ['required'],
            'HOUSEHOLD_ENVIR_TOXIC' => ['required'],
            'HOUSEHOLD_ENVIR_WATER' => ['required'],
            'HOUSEHOLD_ENVIR_DRINKING' => ['required'],
            'HOUSEHOLD_ENVIR_CONTAINER' => ['required'],
            'HOUSEHOLD_ENVIR_COOKING' => ['required'],
            'HOUSEHOLD_ENVIR_WATER_USED' => ['required'],
            'HOUSEHOLD_ENVIR_CONTAINER_USED' => ['required'],
            'HOUSEHOLD_ENVIR_AREA' => ['required'],
            'HOUSEHOLD_ENVIR_ENV_ACT' => ['required'],
            'HOUSEHOLD_ENVIR_ELECTRIC' => ['required'],
            'HOUSEHOLD_ENVIR_CONSERV' => ['required'],
            'HOUSEHOLD_ENVIR_DISASTER' => ['required'],
            'HOUSEHOLD_ENVIR_SOLUTION' => ['required'],
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
            'HOUSEHOLD_ENVIR_WLIGHT.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_CLEAN.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_SAFE.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_BIN.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_H_ENVI.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_TOXIC.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_WATER.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_DRINKING.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_CONTAINER.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_COOKING.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_WATER_USED.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_CONTAINER_USED.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_AREA.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_ENV_ACT.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_ELECTRIC.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_CONSERV.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_DISASTER.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
            'HOUSEHOLD_ENVIR_SOLUTION.required' => 'โปรดเลือกอย่างน้อย 1 ตัวเลือก',
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
