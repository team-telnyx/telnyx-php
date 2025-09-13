<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;

interface QueuesContract
{
    /**
     * @api
     *
     * @return QueueGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;
}
