<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams;
use Telnyx\RequestOptions;

interface NumberLookupRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber The phone number to be looked up
     * @param array<string,mixed>|NumberLookupRetrieveParams $params
     *
     * @return BaseResponse<NumberLookupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberLookupRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
