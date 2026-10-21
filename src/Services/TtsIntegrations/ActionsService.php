<?php

declare(strict_types=1);

namespace Telnyx\Services\TtsIntegrations;

use Telnyx\Client;
use Telnyx\ServiceContracts\TtsIntegrations\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }
}
