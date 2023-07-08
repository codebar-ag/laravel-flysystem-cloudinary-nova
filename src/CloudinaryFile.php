<?php

namespace CodebarAg\FlysystemCloudinaryNova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;

class CloudinaryFile extends File
{
    public function __construct(string $name, string $attribute = null, callable $thumbnailUrl = null)
    {
        parent::__construct($name, $attribute, $thumbnailUrl);

        $this->disk('cloudinary')
            ->storeAs(function (Request $request) use ($attribute) {
                return sha1($request->$attribute->getClientOriginalName());
            });
    }
}
