<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface GlobalIPUsageContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPUsageGetResponse;
}
