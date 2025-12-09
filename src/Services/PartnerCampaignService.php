<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PartnerCampaignContract;

final class PartnerCampaignService implements PartnerCampaignContract
{
    /**
     * @api
     */
    public PartnerCampaignRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PartnerCampaignRawService($client);
    }
}
