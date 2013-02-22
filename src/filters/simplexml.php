<?php

/*
 * Convert an xml file into a simplxml object
 */
$filters['simplexml'] = function ($file_data)
{
    if (strtolower($file_data['ext']) != 'xml') return false;
    $xml = simplexml_load_string($file_data['contents']); 
    return $xml;
};    

