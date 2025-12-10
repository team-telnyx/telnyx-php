<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PartnerCampaignsContract;

final class PartnerCampaignsService implements PartnerCampaignsContract
{
    /**
     * @api
     */
    public PartnerCampaignsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PartnerCampaignsRawService($client);
    }
}
