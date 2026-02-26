<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Queues\Queue;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\Queues\QueueNewResponse;
use Telnyx\Queues\QueueUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\QueuesContract;
use Telnyx\Services\Queues\CallsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Create a new call queue.
     *
     * @param string $queueName The name of the queue. Must be between 1 and 255 characters.
     * @param int $maxSize the maximum number of calls allowed in the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $queueName,
        int $maxSize = 300,
        RequestOptions|array|null $requestOptions = null,
    ): QueueNewResponse {
        $params = Util::removeNulls(
            ['queueName' => $queueName, 'maxSize' => $maxSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an existing call queue
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): QueueGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($queueName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update properties of an existing call queue.
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param int $maxSize the maximum number of calls allowed in the queue
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $queueName,
        int $maxSize,
        RequestOptions|array|null $requestOptions = null,
    ): QueueUpdateResponse {
        $params = Util::removeNulls(['maxSize' => $maxSize]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($queueName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all queues for the authenticated user.
     *
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Queue>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing call queue.
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($queueName, requestOptions: $requestOptions);

        return $response->parse();
    }
}
