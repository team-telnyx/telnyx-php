<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Portouts\PortoutDetails;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams;
use Telnyx\Portouts\PortoutListRejectionCodesParams;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortoutsRawContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortoutGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PortoutListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortoutDetails>>
     *
     * @throws APIException
     */
    public function list(
        array|PortoutListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $portoutID identifies a port out order
     * @param array<string,mixed>|PortoutListRejectionCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortoutListRejectionCodesResponse>
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        array|PortoutListRejectionCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param Status|string $status Path param: Updated portout status
     * @param array<string,mixed>|PortoutUpdateStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortoutUpdateStatusResponse>
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        array|PortoutUpdateStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
