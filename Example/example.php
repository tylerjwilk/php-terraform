<?php

// TODO FINISH ME

// include php-terraform
require('../src/terraform.php');

// directory to be terraformed
$directory = './directory';

// terraforming filters to apply
$filters = array(); // TODO FILTERS

// create new terraformer
$terraform = new Terraformer($directory, $filters);

