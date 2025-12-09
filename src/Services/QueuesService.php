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
    public QueuesRawService $raw;

    /**
     * @api
     */
    public CallsService $calls;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new QueuesRawService($client);
        $this->calls = new CallsService($client);
    }

    /**
     * @api
     *
     * Retrieve an existing call queue
     *
     * @param string $queueName Uniquely identifies the queue by name
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($queueName, requestOptions: $requestOptions);

        return $response->parse();
    }
}
