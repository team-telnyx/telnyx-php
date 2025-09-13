<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;

interface PortingContract
{
    /**
     * @api
     *
     * @return PortingListUkCarriersResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listUkCarriers(
        ?RequestOptions $requestOptions = null
    ): PortingListUkCarriersResponse;

    /**
     * @api
     *
     * @return PortingListUkCarriersResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listUkCarriersRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PortingListUkCarriersResponse;
}
