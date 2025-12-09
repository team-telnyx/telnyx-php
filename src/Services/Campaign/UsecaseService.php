<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Client;
use Telnyx\ServiceContracts\Campaign\UsecaseContract;

final class UsecaseService implements UsecaseContract
{
    /**
     * @api
     */
    public UsecaseRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsecaseRawService($client);
    }
}
