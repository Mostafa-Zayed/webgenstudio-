<?php

function has_presence($value){
    return isset($value) && $value != '' & !empty($value);
}

function max_length($value,$max)
{
    return strlen($value) <= $max;
}

function min_length($value,$min)
{
    return strlen($value)  >= $min;
}

function has_in_array($vlaue,$set)
{
    return in_array($vlaue,$set);
}
