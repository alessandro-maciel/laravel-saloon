<?php

namespace App\Http\Integrations\GitHub\Requests;

use App\Http\Integrations\GitHub\DataObjects\Workflow;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use App\Http\Integrations\GitHub\GitHubConnector;
use Illuminate\Support\Collection;

class ListRepositoryWorkflowsRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = GitHubConnector::class;

    protected ?string $method = Saloon::GET;

    public function __construct(
        private string $owner,
        private string $repo,
    ) {
    }

    public function defineEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/actions/workflows";
    }

    protected function castToDto(SaloonResponse $response): Collection
    {
        return collect($response->json('workflows'))->map(
            fn ($workflow) => Workflow::fromSaloon($workflow)
        );
    }
}
