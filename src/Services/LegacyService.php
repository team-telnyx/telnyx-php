<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\LegacyContract;
use Telnyx\Services\Legacy\ReportingService;

final class LegacyService implements LegacyContract
{
    /**
     * @api
     */
    public LegacyRawService $raw;

    /**
     * @api
     */
    public ReportingService $reporting;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LegacyRawService($client);
        $this->reporting = new ReportingService($client);
    }
}
