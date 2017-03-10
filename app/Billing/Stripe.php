<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.03.17
 * Time: 12:36
 */

namespace App\Billing;


class Stripe
{
    protected $secret;

    public function __construct($secret)
    {
        $this->secret = $secret;
    }
}