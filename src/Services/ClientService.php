<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\ClientContract;
use Telnyx\Services\Client\WellKnownService;

final class ClientService implements ClientContract
{
    /**
     * @@api
     */
    public WellKnownService $wellKnown;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->wellKnown = new WellKnownService($client);
    }
}
