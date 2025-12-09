<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;

interface QueuesContract
{
    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;
}
