<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Queues;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\RequestOptions;

interface CallsContract
{
    /**
     * @api
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
    ): CallGetResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): DefaultPagination;

    /**
     * @api
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
    ): mixed;
}
