<?php

declare(strict_types=1);

namespace Telnyx\Services\Brand;

use Telnyx\Client;
use Telnyx\ServiceContracts\Brand\ExternalVettingRawContract;

final class ExternalVettingRawService implements ExternalVettingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
