<?php

namespace App\Http\Integrations\GitHub;

use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;

class GitHubConnector extends SaloonConnector
{
    use AcceptsJson;

    /**
     * The Base URL of the API.
     *
     * @return string
     */
    public function defineBaseUrl(): string
    {
        return (string) config('services.github.url');
    }

    /**
     * The headers that will be applied to every request.
     *
     * @return string[]
     */
    public function defaultHeaders(): array
    {
        return [];
    }

    /**
     * The config options that will be applied to every request.
     *
     * @return string[]
     */
    public function defaultConfig(): array
    {
        return [
            'timeout' => 30,
        ];
    }
}
