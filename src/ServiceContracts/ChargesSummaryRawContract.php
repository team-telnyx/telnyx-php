<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\ChargesSummary\ChargesSummaryRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChargesSummaryRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChargesSummaryRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChargesSummaryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesSummaryRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
