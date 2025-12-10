<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\CampaignBuilderContract;
use Telnyx\Services\CampaignBuilder\BrandService;

final class CampaignBuilderService implements CampaignBuilderContract
{
    /**
     * @api
     */
    public CampaignBuilderRawService $raw;

    /**
     * @api
     */
    public BrandService $brand;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CampaignBuilderRawService($client);
        $this->brand = new BrandService($client);
    }
}
