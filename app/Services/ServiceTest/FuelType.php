<?php


namespace App\Services\ServiceTest;
use App\Services\ServiceTest\FuelControl;

class FuelType
{

    private $fuelConsumption;

    public function __construct(FuelControl $fuelControl)
    {
        $this->fuelConsumption = $fuelControl;
    }

    public function premium(){

        $this->fuelConsumption->premiumGasoline(50);
    }
}

//class FuelType
//{
//
//    private $fuelConsumption;
//
//    public function __construct(FuelConsumption $consumption)
//    {
//        $this->fuelConsumption = $consumption;
//    }
//
//    public function premium(){
//
//        $this->fuelConsumption->premiumGasoline(50);
//    }
//}
