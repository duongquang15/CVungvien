<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;

class DuplicateEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $user_list;
    protected $user_email;

    public function __construct($users, $user_old_email)
    {
        //
        $this->user_list = $users;
        $this->user_email = $user_old_email;
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
        //
        foreach ($this->user_list as $user) {
            if ($value !== $this->user_email && $value == $user->email) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email trùng email đã có';
    }
}
