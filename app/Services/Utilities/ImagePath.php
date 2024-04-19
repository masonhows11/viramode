<?php


namespace App\Services\Utilities;


class ImagePath
{

    public static function imageName($request)
    {
        return  $image = str_ireplace('http://store.test/storage/images/','',$request);

    }
}
