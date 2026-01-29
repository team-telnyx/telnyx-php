<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy;

use Telnyx\Client;
use Telnyx\ServiceContracts\Legacy\ReportingContract;
use Telnyx\Services\Legacy\Reporting\BatchDetailRecordsService;
use Telnyx\Services\Legacy\Reporting\UsageReportsService;

final class ReportingService implements ReportingContract
{
    /**
     * @api
     */
    public ReportingRawService $raw;

    /**
     * @api
     */
    public BatchDetailRecordsService $batchDetailRecords;

    /**
     * @api
     */
    public UsageReportsService $usageReports;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReportingRawService($client);
        $this->batchDetailRecords = new BatchDetailRecordsService($client);
        $this->usageReports = new UsageReportsService($client);
    }
}
