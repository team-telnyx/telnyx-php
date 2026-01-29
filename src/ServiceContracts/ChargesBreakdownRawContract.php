<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse;
use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ChargesBreakdownRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ChargesBreakdownRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChargesBreakdownGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|ChargesBreakdownRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
