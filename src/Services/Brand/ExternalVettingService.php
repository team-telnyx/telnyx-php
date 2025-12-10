<?php

declare(strict_types=1);

namespace Telnyx\Services\Brand;

use Telnyx\Client;
use Telnyx\ServiceContracts\Brand\ExternalVettingContract;

final class ExternalVettingService implements ExternalVettingContract
{
    /**
     * @api
     */
    public ExternalVettingRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExternalVettingRawService($client);
    }
}
