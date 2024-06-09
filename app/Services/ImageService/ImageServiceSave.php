<?php


namespace App\Services\ImageService;

use Illuminate\Support\Facades\Storage;


class ImageServiceSave
{


    //// save to public folder in root app directory
    //    public function savePublic($image)
    //    {
    //        $image->storeAs('images', 'filename.jpg');
    //    }

    //// save to public folder in storage folder in app directory
    //    public function savePublicStorage($image, $path)
    //    {
    //
    //        $uploaded_path = $path . DIRECTORY_SEPARATOR ;
    //        return Storage::disk('public')->putFileAs($path, $image,'');
    //    }

    //// save to private folder in storage folder in app directory
    //    public function savePrivateStorage($image, $path)
    //    {
    //        $uploaded_path = '';
    //        return Storage::disk('private')->putFileAs($path, $image, '');
    //    }

    //        // for main directory image in public path
    //        if (!file_exists('images')) {
    //            mkdir(public_path('/images'), 666, true);
    //        }


    protected function getImageName($file)
    {
        
        $fileNameWithExt = $file->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        return $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
    }

    //// save to public folder in root app directory and default folder name "images"
    public function savePublic($file)
    {
        $fileNameToStore = $this->getImageName($file);
        if (!file_exists('images')) {
            mkdir(public_path('/images'), 666, false);
        }
        $savePublicPath = '/public/images/' . $fileNameToStore;
        $file->move(public_path('images'), $fileNameToStore);
        return $savePublicPath;
    }

    //// save to public folder root app directory and custom folder in it
    public function SavePublicCustomPath($file, $path)
    {
        $fileNameToStore = $this->getImageName($file);
        // for custom directory
        if (!file_exists('images/' . $path)) {
            mkdir(public_path('/images/' . $path), 666, true);
        }
        $savePublicPath = '/images/' . $path . '/' . $fileNameToStore;
        $file->move(public_path('images/' . $path), $fileNameToStore);

        return $savePublicPath;
    }

    //// save to public folder in storage
    /// folder and add custom folder
    public function savePublicStorage($file, $path = 'images', $name = null)
    {
        $fileNameToStore = $this->getImageName($file);
        $saveStorePath = DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $fileNameToStore;
        Storage::disk('public')->putFileAs($path, $file, $fileNameToStore);
        return $saveStorePath;
    }

    //// save to private folder in storage
    /// folder and add custom folder
    public function savePrivateStorage($file, $path = 'images', $name = null)
    {
        //        $customPath = trim($path, '/\\');
        //        $storageDirectories = Storage::directories('public/' . $customPath);
        //        if (!in_array($customPath, $storageDirectories)) {
        //
        //            Storage::makeDirectory('public/' . $customPath);
        //
        //        }
        //        $storagePath = Storage::path('/public/' . $customPath . '/' . $fileNameToStore);
        //        $saveStorePath = '/' . $customPath . '/' . $fileNameToStore;
        $fileNameToStore = $this->getImageName($file);
        $saveStorePath = DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $fileNameToStore;
        Storage::disk('private')->putFileAs($path, $file, $fileNameToStore);
        return $saveStorePath;
    }


    public function deleteOldStorageImage($file, $path = null)
    {

        if (Storage::disk('public')->exists($file)) {
            Storage::disk('public')->delete($file);
        }

    }

    public static function deleteOldPublicImage($file, $path = null)
    {
        if (file_exists(public_path() . $file)) {
            unlink(public_path() . $file);
        }
    }

}
