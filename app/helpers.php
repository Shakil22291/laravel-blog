<?php

function excerpt($text, int $length = 200) {
    if (strlen($text) < $length) {
        return $text;
    }

    return substr($text, 0, $length) . "....";
}