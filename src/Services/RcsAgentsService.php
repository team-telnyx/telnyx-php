<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\RcsAgentsContract;

final class RcsAgentsService implements RcsAgentsContract
{
    /**
     * @api
     */
    public RcsAgentsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RcsAgentsRawService($client);
    }
}
