<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Queues\CallsContract;

final class CallsService implements CallsContract
{
    /**
     * @api
     */
    public CallsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve an existing call from an existing queue
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $queueName Uniquely identifies the queue by name
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        string $queueName,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse {
        $params = ['queueName' => $queueName];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update queued call's keep_after_hangup flag
     *
     * @param string $callControlID Path param: Unique identifier and token for controlling the call
     * @param string $queueName Path param: Uniquely identifies the queue by name
     * @param bool $keepAfterHangup body param: Whether the call should remain in queue after hangup
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        string $queueName,
        ?bool $keepAfterHangup = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'queueName' => $queueName, 'keepAfterHangup' => $keepAfterHangup,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the list of calls in an existing queue
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param array{
     *   after?: string, before?: string, limit?: int, number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @return DefaultPagination<CallListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($queueName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes an inactive call from a queue. If the call is no longer active, use this command to remove it from the queue.
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $queueName Uniquely identifies the queue by name
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        string $queueName,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['queueName' => $queueName];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
