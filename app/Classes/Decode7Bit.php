<?php

namespace App\Classes;
class Decode7Bit
{
    
    public function _decode7Bit($text) {
        // If there are no spaces on the first line, assume that the body is
        // actually base64-encoded, and decode it.      
        


        // Manually convert common encoded characters into their UTF-8 equivalents.
        $characters = array(
                     '=20' => ' ', // space.
                     '=E2=80=99' => "'", // single quote.
                     '=0A' => "\r\n", // line break.
                     '=A0' => ' ', // non-breaking space.
                     '=C2=A0' => ' ', // non-breaking space.
                     "=\r\n" => '', // joined line.
                     '=E2=80=A6' => '…', // ellipsis.
                     '=E2=80=A2' => '•', // bullet.
        );

        // Loop through the encoded characters and replace any that are found.
        foreach ($characters as $key => $value) {
            $text = str_replace($key, $value, $text);
        }
        return $text;
    }
}
