<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\RequestOptions;

interface GlobalIPLatencyContract
{
    /**
     * @api
     *
     * @param array{
     *   globalIPID?: string|array{in?: string}
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): GlobalIPLatencyGetResponse;
}
