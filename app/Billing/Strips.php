<?php 

namespace App\Billing;

class Strips
{
    protected $secret;
    public function __construct($secret)
    {
        $this->secret = $secret;
    }
}
