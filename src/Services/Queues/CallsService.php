<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\Queues\Calls\CallRemoveParams;
use Telnyx\Queues\Calls\CallRetrieveParams;
use Telnyx\Queues\Calls\CallUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Queues\CallsContract;

final class CallsService implements CallsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve an existing call from an existing queue
     *
     * @param array{queue_name: string}|CallRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $queueName = $parsed['queue_name'];
        unset($parsed['queue_name']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            options: $options,
            convert: CallGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update queued call's keep_after_hangup flag
     *
     * @param array{
     *   queue_name: string, keep_after_hangup?: bool
     * }|CallUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $queueName = $parsed['queue_name'];
        unset($parsed['queue_name']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            body: (object) array_diff_key($parsed, ['queue_name']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the list of calls in an existing queue
     *
     * @param array{
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     * }|CallListParams $params
     *
     * @return DefaultPagination<CallListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        array|CallListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = CallListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s/calls', $queueName],
            query: $parsed,
            options: $options,
            convert: CallListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Removes an inactive call from a queue. If the call is no longer active, use this command to remove it from the queue.
     *
     * @param array{queue_name: string}|CallRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        array|CallRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = CallRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $queueName = $parsed['queue_name'];
        unset($parsed['queue_name']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            options: $options,
            convert: null,
        );
    }
}
