<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\Queues\Calls\CallRemoveParams;
use Telnyx\Queues\Calls\CallRetrieveParams;
use Telnyx\Queues\Calls\CallUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Queues\CallsRawContract;

final class CallsRawService implements CallsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve an existing call from an existing queue
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{queueName: string}|CallRetrieveParams $params
     *
     * @return BaseResponse<CallGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $callControlID Path param: Unique identifier and token for controlling the call
     * @param array{queueName: string, keepAfterHangup?: bool}|CallUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            body: (object) array_diff_key($parsed, ['queueName']),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the list of calls in an existing queue
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param array{
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     * }|CallListParams $params
     *
     * @return BaseResponse<CallListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        array|CallListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['queues/%1$s/calls', $queueName],
            query: $parsed,
            options: $options,
            convert: CallListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes an inactive call from a queue. If the call is no longer active, use this command to remove it from the queue.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array{queueName: string}|CallRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        array|CallRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            options: $options,
            convert: null,
        );
    }
}
