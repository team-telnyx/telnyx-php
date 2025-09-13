<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter;
use Telnyx\OtaUpdates\OtaUpdateListParams\Page;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface OtaUpdatesContract
{
    /**
     * @api
     *
     * @return OtaUpdateGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return OtaUpdateListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateListResponse;
}
