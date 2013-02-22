<?php

// include php-terraform
require('../src/terraform.php');

// directory to be terraformed
$directory = './directory';

// convert an xml file into a simplxml object on the fly
$filters['simplexml'] = function ($file_data)
{
    if (strtolower($file_data['ext']) != 'xml') return false;
    $xml = simplexml_load_string($file_data['contents']); 
    return $xml;
};

// base64_encode on images
$filters['base64_encode_images'] = function ($file_data)
{
    $valid_exts = array('jpg','jpeg','gif','png');
    $matches = in_array(strtolower($file_data['ext']), $valid_exts);
    if (!$matches) return false;
    $data = base64_encode($file_data['contents']);
    return $data;
};

// create new terraformer
$terraform = new Terraform('./directory/',$filters);
$terraform->applyFilters();

print_r($terraform);

