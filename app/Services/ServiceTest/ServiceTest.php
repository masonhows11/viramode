<?php


namespace App\Services\ServiceTest;


class ServiceTest
{

    private $operator;

    public function __construct( $operator )
    {
        $this->operator  = $operator;
    }

    public function Add($number)
    {
        return [
          'input number is :' => $number,
          'added number is' => $number + 5,
          'operator is' => $this->operator,
        ];
    }
}
