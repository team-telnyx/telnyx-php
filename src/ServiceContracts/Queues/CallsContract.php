<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Queues;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\Queues\Calls\CallRemoveParams;
use Telnyx\Queues\Calls\CallRetrieveParams;
use Telnyx\Queues\Calls\CallUpdateParams;
use Telnyx\RequestOptions;

interface CallsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $callControlID,
        array|CallRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callControlID,
        array|CallUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|CallListParams $params
     *
     * @return DefaultPagination<CallListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $queueName,
        array|CallListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|CallRemoveParams $params
     *
     * @throws APIException
     */
    public function remove(
        string $callControlID,
        array|CallRemoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
