<?php

// include php-terraform lib
require('../src/terraform.php');

// directory to be terraformed
$directory = './directory';

// simplexml filter
include('../src/filters/simplexml.php');

// base64 encode images filter
include('../src/filters/base64_encode_images.php');

// create new terraformer
$terraform = new Terraform('./directory/',$filters);
$terraform->applyFilters();

// dump object
print_r($terraform);

