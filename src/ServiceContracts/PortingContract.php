<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;

interface PortingContract
{
    /**
     * @api
     */
    public function listUkCarriers(
        ?RequestOptions $requestOptions = null
    ): PortingListUkCarriersResponse;
}
