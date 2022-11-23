<?php

namespace Delgont\CmsUi\Console;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Str;


class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:install
                            {--fresh : Freshly install delgont boostrap ui}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $fresh = ($this->option('fresh')) ? true : false;
        $this->call('vendor:publish', ['--tag' => 'delgont-assets', '--force' => $fresh]);
    }

}
