<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams;
use Telnyx\RequestOptions;

interface NumberLookupContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumberLookupRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberLookupRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupGetResponse;
}
