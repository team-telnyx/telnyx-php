<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;
use Telnyx\RequestOptions;

interface GlobalIPAllowedPortsContract
{
    /**
     * @api
     *
     * @return GlobalIPAllowedPortListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPAllowedPortListResponse;
}
