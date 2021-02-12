<?php
namespace App\models;

use Intervention\Image\ImageManagerStatic as Image;

class ImageManager
{

    public function upload($data)
    {
        $path = 'uploads/photo.jpg';
        if (!empty($data['img']['tmp_name']) ) {
            $img = Image::make($data['img']['tmp_name']);
            $img->fit(600, 400);
            $img->contrast(75);
            $img->blur();
            $filename = rand() . '.jpg';
            $path = 'uploads/' . $filename;
            $img->save('uploads/' . $filename);
            return $path;
        }
        return $path;
    }
}