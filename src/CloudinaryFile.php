<?php

namespace CodebarAg\FlysystemCloudinaryNova;

use Laravel\Nova\Fields\File;
use Illuminate\Http\Request;

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
