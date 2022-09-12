<?php

namespace App\Console\Commands\GitHub;

use Illuminate\Console\Command;

class ListRepositoryWorkflows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:workflows
        {owner : The owner or organisation.}
        {repo : The repository we are looking at.}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buscar uma lista de fluxos de trabalho do GitHub pelo nome do repositório';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
