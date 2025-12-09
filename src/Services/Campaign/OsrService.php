<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Client;
use Telnyx\ServiceContracts\Campaign\OsrContract;

final class OsrService implements OsrContract
{
    /**
     * @api
     */
    public OsrRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OsrRawService($client);
    }
}
