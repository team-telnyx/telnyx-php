<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface PortoutsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortoutGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortoutListParams $params
     *
     * @return DefaultPagination<PortoutDetails>
     *
     * @throws APIException
     */
    public function list(
        array|PortoutListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|PortoutListRejectionCodesParams $params
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        array|PortoutListRejectionCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortoutListRejectionCodesResponse;

    /**
     * @api
     *
     * @param Status|value-of<Status> $status
     * @param array<mixed>|PortoutUpdateStatusParams $params
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        array|PortoutUpdateStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortoutUpdateStatusResponse;
}
