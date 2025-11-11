<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ChargesBreakdownContract
{
    /**
     * @api
     *
     * @param array<mixed>|ChargesBreakdownRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesBreakdownRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ChargesBreakdownGetResponse;
}
