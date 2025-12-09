<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Queues;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\Queues\Calls\CallRemoveParams;
use Telnyx\Queues\Calls\CallRetrieveParams;
use Telnyx\Queues\Calls\CallUpdateParams;
use Telnyx\RequestOptions;

interface CallsRawContract
{
    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|CallRetrieveParams $params
     *
     * @return BaseResponse<CallGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Path param: Unique identifier and token for controlling the call
     * @param array<mixed>|CallUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $queueName Uniquely identifies the queue by name
     * @param array<mixed>|CallListParams $params
     *
     * @return BaseResponse<DefaultPagination<CallListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        array|CallListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param array<mixed>|CallRemoveParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        array|CallRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
