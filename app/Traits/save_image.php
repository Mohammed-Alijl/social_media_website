<?php

namespace App\Traits;
trait save_image
{
    function saveImage($photo, $path)
    {
        $file_extension = $photo->getClientOriginalExtension();
        $photo_name = time() . '.' . $file_extension;
        $photo->move($path, $photo_name);
        return $photo_name;
    }
}
