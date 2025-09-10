<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse;
use Telnyx\RequestOptions;

interface GlobalIPProtocolsContract
{
    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPProtocolListResponse;
}
