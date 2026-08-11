<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\RcsContract;
use Telnyx\Services\Rcs\AgentsService;

final class RcsService implements RcsContract
{
    /**
     * @api
     */
    public RcsRawService $raw;

    /**
     * @api
     */
    public AgentsService $agents;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RcsRawService($client);
        $this->agents = new AgentsService($client);
    }
}
