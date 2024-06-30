 <?php

function checkinput($value)
{
    $value = htmlentities($value);
    $value = trim($value);
    return $value;
}