<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\TestsContract;
use Telnyx\Services\AI\Tests\SchedulesService;
use Telnyx\Services\AI\Tests\TestFrameworkService;

final class TestsService implements TestsContract
{
    /**
     * @api
     */
    public TestsRawService $raw;

    /**
     * @api
     */
    public SchedulesService $schedules;

    /**
     * @api
     */
    public TestFrameworkService $testFramework;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TestsRawService($client);
        $this->schedules = new SchedulesService($client);
        $this->testFramework = new TestFrameworkService($client);
    }
}
