<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs;

use Telnyx\Client;
use Telnyx\ServiceContracts\Rcs\AgentsContract;

final class AgentsService implements AgentsContract
{
    /**
     * @api
     */
    public AgentsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AgentsRawService($client);
    }
}
