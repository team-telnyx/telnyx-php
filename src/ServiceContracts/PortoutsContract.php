<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Portouts\PortoutDetails;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams\Filter;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortoutsContract
{
    /**
     * @api
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PortoutGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[carrier_name], filter[country_code], filter[country_code_in], filter[foc_date], filter[inserted_at], filter[phone_number], filter[pon], filter[ported_out_at], filter[spid], filter[status], filter[status_in], filter[support_key]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortoutDetails>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $portoutID identifies a port out order
     * @param \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortoutListRejectionCodesResponse;

    /**
     * @api
     *
     * @param Status|string $status Path param: Updated portout status
     * @param string $id Path param: Portout id
     * @param string $reason Body param: Provide a reason if rejecting the port out request
     * @param bool $hostMessaging Body param: Indicates whether messaging services should be maintained with Telnyx after the port out completes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        string $id,
        string $reason,
        bool $hostMessaging = false,
        RequestOptions|array|null $requestOptions = null,
    ): PortoutUpdateStatusResponse;
}
