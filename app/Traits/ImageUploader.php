<?php

namespace App\Traits;

use Illuminate\Http\UploadFile;
use Illuminate\Support\Facades\Storage;

trait ImageUploader
{

    public function ImageUpload($query)
    {
        $image_name = "photo".time();
        $ext = strtolower($query->getClientOriginalExtension());
        $image_full_name = $image_name.".".$ext;
        $upload_path = "images/photos/";
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path, $image_full_name);
        return $image_url;
    }

}