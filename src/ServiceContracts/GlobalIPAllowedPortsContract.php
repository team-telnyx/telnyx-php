<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;
use Telnyx\RequestOptions;

interface GlobalIPAllowedPortsContract
{
    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPAllowedPortListResponse;
}
