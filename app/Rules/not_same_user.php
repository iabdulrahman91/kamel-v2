<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Listing;


class not_same_user implements Rule
{
    private $listing;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Listing $listing)
    {
        //
        $this->listing = $listing;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $owner = $this->listing->user->id;
        $user_id = auth()->id();
        if ($owner != $user_id) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, you can not rent from yourself.';
    }
}
