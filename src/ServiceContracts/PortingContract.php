<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;

interface PortingContract
{
    /**
     * @api
     *
     * @return PortingListUkCarriersResponse<HasRawResponse>
     */
    public function listUkCarriers(
        ?RequestOptions $requestOptions = null
    ): PortingListUkCarriersResponse;
}
