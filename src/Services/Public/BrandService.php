<?php

declare(strict_types=1);

namespace Telnyx\Services\Public;

use Telnyx\Client;
use Telnyx\ServiceContracts\Public\BrandContract;

final class BrandService implements BrandContract
{
    /**
     * @api
     */
    public BrandRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandRawService($client);
    }
}
