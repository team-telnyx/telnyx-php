<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface GlobalIPLatencyContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPLatencyGetResponse;
}
