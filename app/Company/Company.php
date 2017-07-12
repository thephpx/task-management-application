<?php

namespace App\Company;


class Company
{

    public $company_name;

    public function __construct($key)
    {

        $this->company_name = $key;

    }

}