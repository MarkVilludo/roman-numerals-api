<?php

namespace App\Services;

class RomanNumeralConverter
{

    public function convertInteger($num)
    {
        // Be sure to convert the given parameter into an integer
        /**
         // Special thanks and credit to
         // https://ourcodeworld.com/articles/read/735/how-to-convert-an-integer-number-to-a-roman-number-in-php
         // and  https://www.calculatorsoup.com/calculators/conversions/roman-numeral-converter.php
         // Converts a number to its roman presentation.
         **/

        $n = intval($num);
        $result = '';

        // Declare a lookup array that we will use to traverse the number:
        $lookup = [
            '_M' => 1000000, '_D' => 500000, '_C' => 100000,
            '_L' => 50000, '_X' => 10000, '_V' => 5000,
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        ];

        foreach ($lookup as $roman => $value) {
            // Look for number of matches
            $matches = intval($n / $value);

            // Concatenate characters
            $result .= str_repeat($roman, $matches);

            // Substract that from the number
            $n = $n % $value;
        }

        return $result;
    }
}
