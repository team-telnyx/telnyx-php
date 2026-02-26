<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Queues\Queue;
use Telnyx\Queues\QueueCreateParams;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\Queues\QueueListParams;
use Telnyx\Queues\QueueNewResponse;
use Telnyx\Queues\QueueUpdateParams;
use Telnyx\Queues\QueueUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\QueuesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Create a new call queue.
     *
     * @param array{queueName: string, maxSize?: int}|QueueCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|QueueCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'queues',
            body: (object) $parsed,
            options: $options,
            convert: QueueNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve an existing call queue
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s', $queueName],
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update properties of an existing call queue.
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param array{maxSize: int}|QueueUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $queueName,
        array|QueueUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['queues/%1$s', $queueName],
            body: (object) $parsed,
            options: $options,
            convert: QueueUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all queues for the authenticated user.
     *
     * @param array{pageNumber?: int, pageSize?: int}|QueueListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Queue>>
     *
     * @throws APIException
     */
    public function list(
        array|QueueListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'queues',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: Queue::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing call queue.
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $queueName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['queues/%1$s', $queueName],
            options: $requestOptions,
            convert: null,
        );
    }
}
