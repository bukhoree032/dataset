<?php

namespace Modules\Member\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username'     => ['required'],
            'password' => ['required', 'min:6'],
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
            'username.required' => 'โปรดระบุชื่อผู้ใช้งาน',
            'password.required' => 'โปรดระบุรหัสผ่าน',
            'password.min' => 'รหัสผ่านอย่างน้อย 6 หลัก',
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
