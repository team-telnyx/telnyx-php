<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface InventoryCoverageContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy]
     *
     * @return InventoryCoverageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): InventoryCoverageListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InventoryCoverageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InventoryCoverageListResponse;
}
