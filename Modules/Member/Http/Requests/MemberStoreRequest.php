<?php

namespace Modules\Member\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Member\Rules\UsernameFormatPattern;

class MemberStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'     => ['required'],
            'province_id' => ['required'],
        ];

        switch ($this->method()) {
            case 'POST':
                $rules = $rules + [
                    'username' => ['required', 'unique:members', new UsernameFormatPattern],
                    'password' => ['required'],
                ];

                return $rules;
            default:
                return $rules;
        }
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'โปรดระบุชื่อผู้ใช้งาน',
            'username.unique'   => 'ชื่อผู้ใช้งานนี้ถูกใช้ไปแล้ว',
            'password.required' => 'โปรดระบุรหัสผ่าน',
            'name.required'     => 'โปรดระบุชื่อผู้เขียน',
            'nickname.required' => 'โปรดระบุชื่อ-นามสกุล',
            'province_id.required' =>'โปรดระบุจังหวัด',
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
