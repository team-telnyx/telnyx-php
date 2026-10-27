<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\BrowserSessionsContract;

final class BrowserSessionsService implements BrowserSessionsContract
{
    /**
     * @api
     */
    public BrowserSessionsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrowserSessionsRawService($client);
    }
}
