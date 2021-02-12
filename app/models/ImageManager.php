<?php
namespace App\models;

use Intervention\Image\ImageManagerStatic as Image;

class ImageManager
{
    public $auth;

    public function __construct()
    {
       // $this->auth = $auth;
    }

    public function upload($data)
    {
      //  var_dump($_FILES);
        $path = 'uploads/photo.jpg';
        if (!empty($data['img']['tmp_name']) ) {
            $img = Image::make($data['img']['tmp_name']);
            $img->fit(600, 400);
            $img->contrast(75);
            // $img->rotate(-5);
            // $img->pixelate(4);
            $img->blur();
            $filename = rand() . '.jpg';
            $path = 'uploads/' . $filename;
            $img->save('uploads/' . $filename);
            return $path;
        }

        return $path;
    }
}