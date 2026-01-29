<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\FineTuningContract;
use Telnyx\Services\AI\FineTuning\JobsService;

final class FineTuningService implements FineTuningContract
{
    /**
     * @api
     */
    public FineTuningRawService $raw;

    /**
     * @api
     */
    public JobsService $jobs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FineTuningRawService($client);
        $this->jobs = new JobsService($client);
    }
}
