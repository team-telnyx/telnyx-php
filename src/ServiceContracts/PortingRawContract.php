<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortingRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingListUkCarriersResponse>
     *
     * @throws APIException
     */
    public function listUkCarriers(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
