<?php

namespace App\Rules;

use App\Song;
use Illuminate\Contracts\Validation\Rule;

class PositionOverlap implements Rule
{
    public $albumId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->albumId = $id;
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
        $song = Song::where('album_id',$this->albumId )->where('track_number', $value)->first();
        if($song == null){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Deze positie is al in gebruik, kies een positie die nog niet gebruikt wordt.';
    }
}
