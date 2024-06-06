<?php

namespace App\Http\Controllers;


// use App\Services\ServiceTest\ServiceTest;
// use App\Services\ServiceTest\FuelConsumption;


class HomeController extends Controller
{
    //
    public function home()
    {


        return view('welcome');
    }

    public function notFound()
    {
        return view('errors_custom.404_error');
    }

    //// one way inject service
    //    public function serviceTest()
    //    {
    //        //  $serviceTest = new ServiceTest();
    //        //  $serviceTest = resolve(ServiceTest::class);
    //        // dd($serviceTest->Add(5));
    //    }

    //// another way inject service
    //    public function serviceTest(ServiceTest $serviceTest)
    //    {
    //        dd($serviceTest->Add(5));
    //    }

    //// inject service with construct argument
    //    public function serviceTest()
    //    {
    //        //  $serviceTest = resolve(ServiceTest::class);
    //        $serviceTest = new ServiceTest('minus');
    //        dd($serviceTest->Add(5));
    //    }

    //// example
    //// inject service with construct argument
    //// in this inject dependency we can not set constructor
    //// argument , the resolve is service provider / container
    /// if defined this ServiceTest  class in app service provider
    /// any where in this app , when we use this class
    /// the app return an instance from this class (ServiceTest)

    //    public function serviceTest(ServiceTest $serviceTest)
    //    {
    //        dd($serviceTest->Add(5));
    //    }

    //// example
    //// inject service with construct argument
    //// in this inject dependency we can not set constructor
    //// argument , the resolve is service provider / container
    /// if defined this ServiceTest  class in app service provider
    /// any where in this app , when we use this class
    /// the app return an instance from this class (ServiceTest)
    //    public function serviceTest(FuelConsumption $fuelConsumption,FuelType $fuelType)
    //    {
    //        $fuelType = $fuelType->premium();
    //        dd($fuelType,$fuelConsumption->refueling(5));
    //    }

    //// example with interface
    //// because service providers originally work with interfaces class
    //// base below defined
    /// when FuelControl::class call , make an instance FuelConsumption::class
    //// we should call  FuelControl interface

    //    public function serviceTest(FuelControl $fuelControl, FuelType $fuelType)
    //    {
    //        $fuelType = $fuelType->premium();
    //        dd($fuelType, $fuelControl->refueling(5));
    //    }






}
