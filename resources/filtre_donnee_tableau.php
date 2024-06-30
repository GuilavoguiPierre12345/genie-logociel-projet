<?php
function filter_array(array $data):array
{
    for($i=0;$i<count($data);$i++){
        $data[$i]=htmlspecialchars($data[$i]);
        $data[$i] = htmlentities($data[$i]);
        $data[$i] = trim($data[$i]);
    }
    return $data;
}