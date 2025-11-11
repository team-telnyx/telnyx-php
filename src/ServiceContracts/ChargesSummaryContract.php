<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesSummary\ChargesSummaryGetResponse;
use Telnyx\ChargesSummary\ChargesSummaryRetrieveParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChargesSummaryContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChargesSummaryRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesSummaryRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChargesSummaryGetResponse;
}
