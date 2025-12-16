<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\ChargesSummary\ChargesSummaryRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChargesSummaryRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChargesSummaryRetrieveParams $params
     *
     * @return BaseResponse<ChargesSummaryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesSummaryRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
