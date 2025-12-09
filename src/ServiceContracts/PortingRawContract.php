<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;

interface PortingRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<PortingListUkCarriersResponse>
     *
     * @throws APIException
     */
    public function listUkCarriers(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
