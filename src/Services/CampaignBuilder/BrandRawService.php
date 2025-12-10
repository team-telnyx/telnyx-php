<?php

declare(strict_types=1);

namespace Telnyx\Services\CampaignBuilder;

use Telnyx\Client;
use Telnyx\ServiceContracts\CampaignBuilder\BrandRawContract;

final class BrandRawService implements BrandRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
