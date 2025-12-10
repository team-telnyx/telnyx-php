<?php

declare(strict_types=1);

namespace Telnyx\Services\Public;

use Telnyx\Client;
use Telnyx\ServiceContracts\Public\BrandRawContract;

final class BrandRawService implements BrandRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
