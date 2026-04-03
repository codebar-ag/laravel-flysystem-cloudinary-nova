<?php

use CodebarAg\FlysystemCloudinaryNova\CloudinaryImage;
use Laravel\Nova\Fields\Image;

beforeEach(function () {
    config([
        'filesystems.disks.cloudinary' => [
            'driver' => 'cloudinary',
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
            'api_key' => env('CLOUDINARY_API_KEY'),
            'api_secret' => env('CLOUDINARY_API_SECRET'),
            'url' => [
                'secure' => (bool) env('CLOUDINARY_SECURE_URL', true),
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
})->throws(Exception::class, 'Cloudinary disk is not configured.');

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
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
            'api_key' => env('CLOUDINARY_API_KEY'),
            'api_secret' => env('CLOUDINARY_API_SECRET'),
            'url' => [
                'secure' => (bool) env('CLOUDINARY_SECURE_URL', true),
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
})->throws(Exception::class, 'Cloudinary disk is not configured.');
