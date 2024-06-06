<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

trait UploadFile
{
    public function uploadImage($request, $path, $filename = null, $crops = array(), $prefixThumb = 'thumb_')
    {
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path, 0777, TRUE));
        }

        $filename = $filename ?? $request->hashName();
        $manager = new ImageManager(new Driver());

        $upload = $manager->read($request)->save($path . $filename);

        if (is_array($crops)) {
            if (count($crops) > 0) {
                foreach ($crops as $crop) {
                    $manager->read($request)->cover($crop['width'], $crop['height'])->save($path . $prefixThumb . $filename);
                }
            }
        }

        return $upload;
    }

    public function uploadFile($request, $path, $filename = null)
    {
        $filename = $filename ?? $request->hashName();

        return Storage::disk('public_uploads')->putFileAs($path, $request, $filename, 'public');
    }
}