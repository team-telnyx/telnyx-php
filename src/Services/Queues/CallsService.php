<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams;
use Telnyx\Queues\Calls\CallListParams\Page;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\Queues\Calls\CallRemoveParams;
use Telnyx\Queues\Calls\CallRetrieveParams;
use Telnyx\Queues\Calls\CallUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Queues\CallsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $queueName
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse {
        $params = ['queueName' => $queueName];

        return $this->retrieveRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallGetResponse {
        [$parsed, $options] = CallRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

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
     * @param string $queueName
     * @param bool $keepAfterHangup whether the call should remain in queue after hangup
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        $queueName,
        $keepAfterHangup = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'queueName' => $queueName, 'keepAfterHangup' => $keepAfterHangup,
        ];

        return $this->updateRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = CallUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

        // @phpstan-ignore-next-line;
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CallListResponse {
        $params = ['page' => $page];

        return $this->listRaw($queueName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $queueName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CallListResponse {
        [$parsed, $options] = CallListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $queueName
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['queueName' => $queueName];

        return $this->removeRaw($callControlID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function removeRaw(
        string $callControlID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = CallRemoveParams::parseRequest(
            $params,
            $requestOptions
        );
        $queueName = $parsed['queueName'];
        unset($parsed['queueName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['queues/%1$s/calls/%2$s', $queueName, $callControlID],
            options: $options,
            convert: null,
        );
    }
}
