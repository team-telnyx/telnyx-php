<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Queues;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams\Page;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\Queues\Calls\CallListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallsContract
{
    /**
     * @api
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
    ): CallGetResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): mixed;
}
