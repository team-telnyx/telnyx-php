<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface QueuesContract
{
    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): QueueGetResponse;
}
