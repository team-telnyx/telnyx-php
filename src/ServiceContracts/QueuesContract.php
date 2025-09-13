<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;

interface QueuesContract
{
    /**
     * @api
     *
     * @return QueueGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;

    /**
     * @api
     *
     * @return QueueGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $queueName,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;
}
