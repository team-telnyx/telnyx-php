<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\PortoutDetails;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams;
use Telnyx\Portouts\PortoutListRejectionCodesParams;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;

interface PortoutsRawContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     *
     * @return BaseResponse<PortoutGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortoutListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortoutDetails>>
     *
     * @throws APIException
     */
    public function list(
        array|PortoutListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $portoutID identifies a port out order
     * @param array<mixed>|PortoutListRejectionCodesParams $params
     *
     * @return BaseResponse<PortoutListRejectionCodesResponse>
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        array|PortoutListRejectionCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param Status|value-of<Status> $status Path param: Updated portout status
     * @param array<mixed>|PortoutUpdateStatusParams $params
     *
     * @return BaseResponse<PortoutUpdateStatusResponse>
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        array|PortoutUpdateStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
