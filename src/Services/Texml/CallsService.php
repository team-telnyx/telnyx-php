<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml;

use Telnyx\Client;
use Telnyx\ServiceContracts\Texml\CallsContract;

final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public CallsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallsRawService($client);
    }
}
