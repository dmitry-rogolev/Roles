<?php

namespace dmitryrogolev\Roles\Console\Commands;

use App\Providers\RoleServiceProvider;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = RoleServiceProvider::TAG.':install 
                                                        {--factories}
                                                        {--migrations}
                                                        {--seeders}
                                                        {--models}';

    protected $description = 'Публикует ресурсы пакета "dmitryrogolev/roles", предоставляющего функционал ролей для фреймворка Laravel.';

    public function handle()
    {
        $tag = RoleServiceProvider::TAG;

        if ($this->option('factories')) {
            $tag .= '-factories';
        } elseif ($this->option('migrations')) {
            $tag .= '-migrations';
        } elseif ($this->option('seeders')) {
            $tag .= '-seeders';
        } elseif ($this->option('models')) {
            $tag .= '-models';
        }

        $this->call('vendor:publish', [
            '--tag' => $tag,
        ]);
    }
}
