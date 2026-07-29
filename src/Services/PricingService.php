<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PricingContract;
use Telnyx\Services\Pricing\ProductsService;

final class PricingService implements PricingContract
{
    /**
     * @api
     */
    public PricingRawService $raw;

    /**
     * @api
     */
    public ProductsService $products;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PricingRawService($client);
        $this->products = new ProductsService($client);
    }
}
