<?php

declare(strict_types=1);

namespace Telnyx\Services\Client\Legacy;

use Telnyx\Client;
use Telnyx\ServiceContracts\Client\Legacy\ReportingContract;
use Telnyx\Services\Client\Legacy\Reporting\BatchDetailRecordsService;
use Telnyx\Services\Client\Legacy\Reporting\UsageReportsService;

final class ReportingService implements ReportingContract
{
    /**
     * @@api
     */
    public BatchDetailRecordsService $batchDetailRecords;

    /**
     * @@api
     */
    public UsageReportsService $usageReports;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batchDetailRecords = new BatchDetailRecordsService($client);
        $this->usageReports = new UsageReportsService($client);
    }
}
