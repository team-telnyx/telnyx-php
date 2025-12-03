<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\QueuesContract;
use Telnyx\Services\Queues\CallsService;

final class QueuesService implements QueuesContract
{
    /**
     * @api
     */
    public CallsService $calls;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->calls = new CallsService($client);
    }

    /**
     * @api
     *
     * Retrieve an existing call queue
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s', $queueName],
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );
    }
}
