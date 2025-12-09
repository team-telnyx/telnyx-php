<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\BrandRawContract;

final class BrandRawService implements BrandRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
