<?php


namespace App\Services\Image;

use Illuminate\Support\Facades\Date;

class ImageServiceTools
{

    protected $image;

    protected $mainDirectory;

    protected $imageDirectory;

    protected $imageName;

    protected $imageFormat;

    protected $finalImgDirectory;

    protected $finalImgName;


    public function setImage($image)
    {
        $this->image = $image;
    }


    //// mainDirectory
    // get main dir
    public function getMainDirectory()
    {
        return $this->mainDirectory;
    }
    // set main dir
    public function setMainDirectory($mainDirectory)
    {
        // remove "/" "\" character in path
        $this->mainDirectory = trim($mainDirectory, '/\\');
    }

    //// imageDirectory
    // get image dir
    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }
    // set image dir
    public function setImageDirectory($imageDirectory)
    {
        // remove "/" "\" character in path
        $this->imageDirectory = trim($imageDirectory, '/\\');
    }

    // imageName
    public function getImageName()
    {
        return $this->imageName;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    // imageFormat
    public function getImageFormat()
    {
        return $this->imageFormat;
    }

    public function setImageFormat($imageFormat)
    {
        $this->imageFormat = $imageFormat;
    }

    //  FinalImgDirectory
    public function getFinalImgDirectory()
    {
        return $this->finalImgDirectory;
    }

    public function setFinalImgDirectory($finalImgDirectory)
    {
        $this->finalImgDirectory = $finalImgDirectory;
    }

    // FinalImgName
    public function getFinalImgName()
    {
        return $this->finalImgName;
    }

    public function setFinalImgName($finalImgName)
    {
        $this->finalImgName = $finalImgName;
    }


    protected function checkDirectory($imageDirectory)
    {

        if (!file_exists($imageDirectory)) {
            mkdir($imageDirectory,666,true);
        }
    }

    public function getImageAddress()
    {
        return $this->finalImgDirectory . DIRECTORY_SEPARATOR . $this->finalImgName;
    }

    protected function provider(){

        // set properties
        $this->getImageDirectory() ??
        $this->setImageDirectory(date('Y') . DIRECTORY_SEPARATOR . data('m') . DIRECTORY_SEPARATOR .data('d'));

        $this->getImageName() ?? $this->setImageName(time());
        $this->getImageFormat() ?? $this->setImageFormat($this->image->extention());


        // set final image directory
        $finalImageDirectory = empty($this->getMainDirectory())
            ? $this->getImageDirectory()
            : $this->getMainDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
        $this->setFinalImgDirectory($finalImageDirectory);

        // set final image name
        $this->setFinalImgName($this->getImageName() . '.' . $this->getImageFormat());

        // check and create final imageDirectory
        $this->checkDirectory($this->getFinalImgDirectory());

    }


    public function setCurrentImageName()
    {
        return !empty($this->image) ?
            $this->setImageName(pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME)) :
            false;
    }


}
