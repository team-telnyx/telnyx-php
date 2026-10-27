<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\Tests\SchedulesContract;
use Telnyx\Services\AI\Tests\Schedules\V1Service;

final class SchedulesService implements SchedulesContract
{
    /**
     * @api
     */
    public SchedulesRawService $raw;

    /**
     * @api
     */
    public V1Service $v1;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SchedulesRawService($client);
        $this->v1 = new V1Service($client);
    }
}
