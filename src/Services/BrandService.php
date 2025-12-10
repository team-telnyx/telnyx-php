<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\BrandContract;
use Telnyx\Services\Brand\ExternalVettingService;

final class BrandService implements BrandContract
{
    /**
     * @api
     */
    public BrandRawService $raw;

    /**
     * @api
     */
    public ExternalVettingService $externalVetting;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandRawService($client);
        $this->externalVetting = new ExternalVettingService($client);
    }
}
