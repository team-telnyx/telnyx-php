<?php

declare(strict_types=1);

namespace Telnyx\Services\Queues;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams\Page;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Queues\CallsContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\Queues\Calls\CallListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        string $queueName,
        RequestOptions|array|null $requestOptions = null,
    ): CallGetResponse {
        $params = Util::removeNulls(['queueName' => $queueName]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        string $queueName,
        ?bool $keepAfterHangup = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['queueName' => $queueName, 'keepAfterHangup' => $keepAfterHangup]
        );

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
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<CallListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        Page|array|null $page = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['page' => $page, 'pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        string $queueName,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['queueName' => $queueName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($callControlID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
