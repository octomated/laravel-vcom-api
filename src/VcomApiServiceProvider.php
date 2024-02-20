<?php

namespace Octomated\VcomApi;

use meteocontrol\client\vcomapi\ApiClient;
use meteocontrol\client\vcomapi\Config;
use meteocontrol\client\vcomapi\Factory;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Octomated\VcomApi\Commands\VcomApiGetSystemsCommand;

class VcomApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-vcom-api')
            ->hasConfigFile()
            ->hasCommand(VcomApiGetSystemsCommand::class);
    }

    public function packageRegistered(): void
    {
        $this->app->bind(ApiClient::class, function () {
            $config = new Config();
            $config->setApiUrl(config('vcom-api.url'));
            $config->setApiUsername(config('vcom-api.username'));
            $config->setApiPassword(config('vcom-api.password'));
            $config->setApiKey(config('vcom-api.api_key'));
            $config->setApiAuthorizationMode(config('vcom-api.auth_mode'));
            $config->validate();

            return new ApiClient(
                Factory::getHttpClient($config),
                Factory::getAuthorizationHandler($config)
            );
        });
    }
}
