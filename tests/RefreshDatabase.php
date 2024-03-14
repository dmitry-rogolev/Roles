<?php

namespace Tests;

trait RefreshDatabase
{
    use \Illuminate\Foundation\Testing\RefreshDatabase;

    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom([
            __DIR__.'/database/migrations',
            __DIR__.'/../database/migrations',
        ]);
    }
}
