<?php

namespace dmitryrogolev\Roles\Providers;

use dmitryrogolev\Roles\Console\Commands\InstallCommand;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
	public const string VERSION = '0.0.1';

    public function boot(): void
    {
        $this->publishResources();
        $this->registerCommands();
        $this->about();
    }

    protected function publishResources(): void
    {
		$this->publishes([
            __DIR__.'/../../stubs/app/Models' => app_path('Models'),
        ], 'roles-models');

        $this->publishes([
            __DIR__.'/../../stubs/database/factories' => database_path('factories'),
        ], 'roles-factories');

        $this->publishes([
            __DIR__.'/../../stubs/database/migrations' => database_path('migrations'),
        ], 'roles-migrations');

        $this->publishes([
            __DIR__.'/../../stubs/database/seeders' => database_path('seeders'),
        ], 'roles-seeders');

        $this->publishes([
			__DIR__.'/../../stubs/app/Models' => app_path('Models'),
            __DIR__.'/../../stubs/database/factories' => database_path('factories'),
            __DIR__.'/../../stubs/database/migrations' => database_path('migrations'),
            __DIR__.'/../../stubs/database/seeders' => database_path('seeders'),
        ], 'roles');
    }

    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    protected function about(): void
    {
        AboutCommand::add('dmitryrogolev/roles', fn () => ['Version' => '0.0.1']);
    }
}
