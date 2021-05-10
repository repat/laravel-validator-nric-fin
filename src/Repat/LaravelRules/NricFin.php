<?php

namespace Repat\LaravelRules;

use Illuminate\Contracts\Validation\Rule;

class NricFin implements Rule
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
        if (strlen($value) !== 9) {
            return false;
        }

        $newNumber = strtoupper($value);
        $icArray = [];
        for ($i = 0; $i < 9; $i++) {
            $icArray[$i] = $newNumber[$i];
        }
        $icArray[1] = intval($icArray[1], 10) * 2;
        $icArray[2] = intval($icArray[2], 10) * 7;
        $icArray[3] = intval($icArray[3], 10) * 6;
        $icArray[4] = intval($icArray[4], 10) * 5;
        $icArray[5] = intval($icArray[5], 10) * 4;
        $icArray[6] = intval($icArray[6], 10) * 3;
        $icArray[7] = intval($icArray[7], 10) * 2;

        $weight = 0;
        for ($i = 1; $i < 8; $i++) {
            $weight += $icArray[$i];
        }
        $offset = ($icArray[0] === 'T' || $icArray[0] == 'G') ? 4 : 0;
        $temp = ($offset + $weight) % 11;

        $st = ['J', 'Z', 'I', 'H', 'G', 'F', 'E', 'D', 'C', 'B', 'A'];
        $fg = ['X', 'W', 'U', 'T', 'R', 'Q', 'P', 'N', 'M', 'L', 'K'];

        $theAlpha = '';
        if ($icArray[0] == 'S' || $icArray[0] == 'T') {
            $theAlpha = $st[$temp];
        } elseif ($icArray[0] == 'F' || $icArray[0] == 'G') {
            $theAlpha = $fg[$temp];
        }

        return ($icArray[8] === $theAlpha);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid NRIC / FIN.';
    }
}
