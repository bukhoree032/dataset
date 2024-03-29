<?php

namespace Modules\Account\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;
use Auth;

class MatchOldPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(Auth::guard('member')->check()){
            return Hash::check($value, Auth::guard('member')->user()->password);
        }
        else{
            return Hash::check($value, Auth::user()->password);
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ไม่พบรหัสผ่านที่ท่านระบุไว้ในระบบ';
    }
}
