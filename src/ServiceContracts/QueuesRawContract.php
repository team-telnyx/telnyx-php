<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Queues\QueueCreateParams;
use Telnyx\Queues\QueueGetResponse;
use Telnyx\Queues\QueueListParams;
use Telnyx\Queues\QueueListResponse;
use Telnyx\Queues\QueueNewResponse;
use Telnyx\Queues\QueueUpdateParams;
use Telnyx\Queues\QueueUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface QueuesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|QueueCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<QueueNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|QueueCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param array<string,mixed>|QueueUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|QueueListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<QueueListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|QueueListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
