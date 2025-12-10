<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PhoneNumberCampaignsContract;

final class PhoneNumberCampaignsService implements PhoneNumberCampaignsContract
{
    /**
     * @api
     */
    public PhoneNumberCampaignsRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberCampaignsRawService($client);
    }
}
