<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\Schedules;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\Tests\Schedules\V1Contract;
use Telnyx\Services\AI\Tests\Schedules\V1\CronJobsService;

final class V1Service implements V1Contract
{
    /**
     * @api
     */
    public V1RawService $raw;

    /**
     * @api
     */
    public CronJobsService $cronJobs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new V1RawService($client);
        $this->cronJobs = new CronJobsService($client);
    }
}
