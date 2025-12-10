<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PublicContract;
use Telnyx\Services\Public\BrandService;

final class PublicService implements PublicContract
{
    /**
     * @api
     */
    public PublicRawService $raw;

    /**
     * @api
     */
    public BrandService $brand;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PublicRawService($client);
        $this->brand = new BrandService($client);
    }
}
