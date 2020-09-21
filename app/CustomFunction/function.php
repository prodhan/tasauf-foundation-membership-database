<?php
/**
 * Created by Ariful Islam.
 * Organization : Pigeon Soft
 * Date: 09/21/2020
 * Time: 1:39 PM
 */

if (!function_exists('to_word')) {
    function to_word($number)
    {
// create the number to words "manager" class
        $numberToWords = new \NumberToWords\NumberToWords();

// build a new currency transformer using the RFC 3066 language identifier
        $currencyTransformer = $numberToWords->getNumberTransformer('en');
        return $currencyTransformer->toWords($number);
//        return $number;

    }

}