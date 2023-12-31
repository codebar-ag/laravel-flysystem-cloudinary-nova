<?php

namespace CodebarAg\FlysystemCloudinaryNova;

use Exception;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Image;

class CloudinaryImage extends Image
{
    public function __construct($name, $attribute = null, $disk = null, $storageCallback = null)
    {
        parent::__construct($name, $attribute, $disk, $storageCallback);

        // Check if cloudinary disk is configured
        if (! config('filesystems.disks.cloudinary')) {
            throw new Exception('Cloudinary disk is not configured.');
        }

        // Set the disk to cloudinary and store as by default
        $this->disk('cloudinary')
            ->storeAs(fn () => Str::orderedUuid()->toString());
    }
}
