<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;

interface QueuesRawContract
{
    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
