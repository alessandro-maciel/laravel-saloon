<?php

namespace App\Http\Integrations\GitHub\DataObjects;

class Workflow
{
    public function __construct(
        public int $id,
        public string $name,
        public string $state,
    ) {
    }

    public static function fromSaloon(array $workflow): static
    {
        return new static(
            id: intval(data_get($workflow, 'id')),
            name: strval(data_get($workflow, 'name')),
            state: strval(data_get($workflow, 'state')),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'state' => $this->state,
        ];
    }
}
