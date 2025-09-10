<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\BundlePricingContract;
use Telnyx\Services\BundlePricing\BillingBundlesService;
use Telnyx\Services\BundlePricing\UserBundlesService;

final class BundlePricingService implements BundlePricingContract
{
    /**
     * @@api
     */
    public BillingBundlesService $billingBundles;

    /**
     * @@api
     */
    public UserBundlesService $userBundles;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->billingBundles = new BillingBundlesService($this->client);
        $this->userBundles = new UserBundlesService($this->client);
    }
}
