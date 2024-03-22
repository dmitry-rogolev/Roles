<?php

namespace dmitryrogolev\Roles\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'roles:install 
                                {--models}
                                {--factories}
                                {--migrations}
                                {--seeders}';

    protected $description = 'Устанавливает функционал ролей для фреймворка Laravel.';

    public function handle()
    {
        $tag = 'roles';

        if ($this->option('models')) {
            $tag .= '-models';
        } elseif ($this->option('factories')) {
            $tag .= '-factories';
        } elseif ($this->option('migrations')) {
            $tag .= '-migrations';
        } elseif ($this->option('seeders')) {
            $tag .= '-seeders';
        }

        $this->call('vendor:publish', [
            '--tag' => $tag,
        ]);
    }
}
