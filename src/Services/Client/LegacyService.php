<?php

declare(strict_types=1);

namespace Telnyx\Services\Client;

use Telnyx\Client;
use Telnyx\ServiceContracts\Client\LegacyContract;
use Telnyx\Services\Client\Legacy\ReportingService;

final class LegacyService implements LegacyContract
{
    /**
     * @@api
     */
    public ReportingService $reporting;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->reporting = new ReportingService($client);
    }
}
