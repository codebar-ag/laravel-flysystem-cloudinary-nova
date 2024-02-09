<?php

namespace CodebarAg\FlysystemCloudinaryNova;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Image;

class CloudinaryImage extends Image
{
    public function __construct($name, $attribute = null, $disk = 'cloudinary', $storageCallback = null)
    {
        parent::__construct($name, $attribute, $disk, $storageCallback);

        // Check if cloudinary disk is configured
        if (! config('filesystems.disks.cloudinary')) {
            throw new Exception('Cloudinary disk is not configured.');
        }

        $this->thumbnail(function () {
            return $this->value
                ? Storage::disk('cloudinary')->url([
                    'path' => $this->value,
                    'options' => [
                        'w_64',
                        'h_64',
                        'c_fill',
                        'f_auto',
                    ],
                ])
                : null;
        })->preview(function () {
            return $this->value
                ? Storage::disk('cloudinary')->url([
                    'path' => $this->value,
                    'options' => [
                        'w_318',
                        'f_auto',
                    ],
                ])
                : null;
        })
            ->disk($disk)
            ->storeAs(fn () => Str::orderedUuid()->toString());
    }
}
