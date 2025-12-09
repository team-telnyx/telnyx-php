<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\QueuesRawContract;

final class QueuesRawService implements QueuesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve an existing call queue
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s', $queueName],
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );
    }
}
