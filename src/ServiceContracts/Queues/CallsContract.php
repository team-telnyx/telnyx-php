<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Queues;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams\Page;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CallsContract
{
    /**
     * @api
     *
     * @param string $queueName
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse;

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
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse;

    /**
     * @api
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
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CallListResponse;

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
    ): CallListResponse;

    /**
     * @api
     *
     * @param string $queueName
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
