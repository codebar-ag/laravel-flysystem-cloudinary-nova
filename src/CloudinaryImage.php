<?php

namespace CodebarAg\FlysystemCloudinaryNova;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\Image;

class CloudinaryImage extends Image
{
    /**
     * @param  \Stringable|string  $name
     * @param  string|callable|null  $attribute
     * @param  (callable(Request, object, string, string, ?string, ?string):(mixed))|null  $storageCallback
     */
    public function __construct($name, mixed $attribute = null, ?string $disk = 'cloudinary', ?callable $storageCallback = null)
    {
        parent::__construct($name, $attribute, $disk, $storageCallback);

        $configuredDisk = config('filesystems.disks.'.$this->getStorageDisk());
        if (! $configuredDisk) {
            throw new Exception('Cloudinary disk is not configured.');
        }

        $this->thumbnail(function () {
            return $this->value
                // @phpstan-ignore-next-line
                ? Storage::disk($this->getStorageDisk())->url([
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
                // @phpstan-ignore-next-line
                ? Storage::disk($this->getStorageDisk())->url([
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
