<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\CampaignContract;
use Telnyx\Services\Campaign\OsrService;
use Telnyx\Services\Campaign\UsecaseService;

final class CampaignService implements CampaignContract
{
    /**
     * @api
     */
    public CampaignRawService $raw;

    /**
     * @api
     */
    public UsecaseService $usecase;

    /**
     * @api
     */
    public OsrService $osr;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CampaignRawService($client);
        $this->usecase = new UsecaseService($client);
        $this->osr = new OsrService($client);
    }
}
