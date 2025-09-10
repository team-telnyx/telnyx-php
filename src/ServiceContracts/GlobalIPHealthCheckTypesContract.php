<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse;
use Telnyx\RequestOptions;

interface GlobalIPHealthCheckTypesContract
{
    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckTypeListResponse;
}
