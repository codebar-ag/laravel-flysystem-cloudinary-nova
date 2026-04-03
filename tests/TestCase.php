<?php

namespace CodebarAg\FlysystemCloudinaryNova\Tests;

use CodebarAg\FlysystemCloudinaryNova\FlysystemCloudinaryNovaServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            FlysystemCloudinaryNovaServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-flysystem-cloudinary-nova_table.php.stub';
        $migration->up();
        */
    }
}
