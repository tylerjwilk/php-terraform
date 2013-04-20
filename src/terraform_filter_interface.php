<?php

// TODO FIXME
interface   Terraform_Filter_Interface
{
    public function setData($file_data); // TODO FileData class
    public function isMatch();
    public function applyFilter();
}
