<?php

use CodebarAg\FlysystemCloudinaryNova\CloudinaryImage;
use Laravel\Nova\Fields\Image;

beforeEach(function () {
    config([
        'filesystems.disks.cloudinary' => [
            'driver' => 'cloudinary',
            'cloud_name' => 'x',
            'api_key' => 'x',
            'api_secret' => 'x',
            'url' => [
                'secure' => true,
            ],
        ],
    ]);
});

it('extends nova image', function () {
    $field = CloudinaryImage::make('Image');

    expect($field)->toBeInstanceOf(Image::class);
});

it('throws an exception if cloudinary disk is not configured', function () {
    config([
        'filesystems.disks.cloudinary' => [],
    ]);

    CloudinaryImage::make('Image');
})->throws(Exception::class, 'CloudinaryImage requires filesystems.disks.cloudinary to be configured with driver [cloudinary].');

it('does not throw an exception if cloudinary disk is configured', function () {
    CloudinaryImage::make('Image');
})->throwsNoExceptions();

it('has the disk configured to cloudinary', function () {
    $field = CloudinaryImage::make('Image');

    expect($field->disk)->toBe('cloudinary');
});

it('uses a custom disk when provided', function () {
    config([
        'filesystems.disks.custom_cloudinary' => [
            'driver' => 'cloudinary',
            'cloud_name' => 'x',
            'api_key' => 'x',
            'api_secret' => 'x',
            'url' => [
                'secure' => true,
            ],
        ],
    ]);

    $field = CloudinaryImage::make('Image', null, 'custom_cloudinary');

    expect($field->disk)->toBe('custom_cloudinary');
});

it('throws when the chosen disk is not configured', function () {
    config([
        'filesystems.disks.cloudinary' => [
            'driver' => 'cloudinary',
            'cloud_name' => 'x',
            'api_key' => 'x',
            'api_secret' => 'x',
        ],
        'filesystems.disks.other_disk' => [],
    ]);

    CloudinaryImage::make('Image', null, 'other_disk');
})->throws(Exception::class, 'CloudinaryImage requires filesystems.disks.other_disk to be configured with driver [cloudinary].');

it('throws when the chosen disk is not the cloudinary driver', function () {
    config([
        'filesystems.disks.cloudinary' => [
            'driver' => 'cloudinary',
            'cloud_name' => 'x',
            'api_key' => 'x',
            'api_secret' => 'x',
        ],
        'filesystems.disks.local_only' => [
            'driver' => 'local',
            'root' => sys_get_temp_dir(),
        ],
    ]);

    CloudinaryImage::make('Image', null, 'local_only');
})->throws(Exception::class, 'CloudinaryImage requires filesystems.disks.local_only to be configured with driver [cloudinary].');
