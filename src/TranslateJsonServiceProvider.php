<?php

namespace Ricadesign\TranslateJson;

use Ricadesign\TranslateJson\Commands\TranslateJsonCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TranslateJsonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('translate-json')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_translate-json_table')
            ->hasCommand(TranslateJsonCommand::class);
    }
}
