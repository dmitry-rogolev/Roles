<?php

namespace dmitryrogolev\Roles\Providers;

use dmitryrogolev\Roles\Console\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public const TAG = 'roles';

    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->publishFiles();
        $this->registerCommands();
    }

    private function publishFiles(): void
    {
        $this->publishes([
            __DIR__.'/../../database/factories' => database_path('factories'),
        ], static::TAG.'-factories');

        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], static::TAG.'-migrations');

        $this->publishes([
            __DIR__.'/../../database/seeders' => database_path('seeders'),
        ], static::TAG.'-seeders');

        $this->publishes([
            __DIR__.'/../../src/Models' => app_path('Models'),
        ], static::TAG.'-models');

        $this->publishes([
            __DIR__.'/../../database/factories' => database_path('factories'),
            __DIR__.'/../../database/migrations' => database_path('migrations'),
            __DIR__.'/../../database/seeders/publish' => database_path('seeders'),
            __DIR__.'/../../src/Models' => app_path('Models'),
        ], static::TAG);
    }

    private function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
