<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;

interface QueuesContract
{
    /**
     * @api
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;
}
