<?php


namespace App\Services\Image;


use Illuminate\Support\Facades\Storage;

class ImageService extends ImageServiceTools
{


    public function save($image)
    {
        $this->setImage($image);
        $this->provider();
        $result = Storage::disk('public')->putFileAs($this->getImageAddress(), $image, $this->getFinalImgName());
        return $result ? $this->getImageAddress() : false;
    }


}
