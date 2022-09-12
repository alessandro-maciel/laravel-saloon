<?php

namespace App\Http\Integrations\GitHub\Requests;

use App\Http\Integrations\GitHub\GitHubConnector;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;

class ListRepositoryWorkflowsRequest extends SaloonRequest
{
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
}
