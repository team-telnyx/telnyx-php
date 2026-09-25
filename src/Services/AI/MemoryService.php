<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\MemoryContract;
use Telnyx\Services\AI\Memory\NamespacesService;

final class MemoryService implements MemoryContract
{
    /**
     * @api
     */
    public MemoryRawService $raw;

    /**
     * @api
     */
    public NamespacesService $namespaces;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MemoryRawService($client);
        $this->namespaces = new NamespacesService($client);
    }
}
