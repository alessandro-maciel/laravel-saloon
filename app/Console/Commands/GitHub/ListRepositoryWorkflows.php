<?php

namespace App\Console\Commands\GitHub;

use Illuminate\Console\Command;
use App\Http\Integrations\GitHub\DataObjects\Workflow;
use App\Http\Integrations\GitHub\Requests\ListRepositoryWorkflowsRequest;

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
    public function handle(): int
    {
        $owner = (string) $this->argument('owner');
        $repo = (string) $this->argument('repo');

        $request = new ListRepositoryWorkflowsRequest(
            owner: $owner,
            repo: $repo,
        );

        $request->withTokenAuth(
            token: (string) config('services.github.token'),
        );

        $this->info(
            string: "Buscando fluxos de trabalho para {$owner}/{$repo}",
        );

        $response = $request->send();

        if ($response->failed()) {
            throw $response->toException();
        }

        $this->table(
            headers: ['ID', 'Name', 'State'],
            rows: $response->dto()->map(fn (Workflow $workflow) => $workflow->toArray())->toArray(),
        );

        return self::SUCCESS;
    }
}
