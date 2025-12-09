<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;

interface NumberLookupContract
{
    /**
     * @api
     *
     * @param string $phoneNumber The phone number to be looked up
     * @param 'carrier'|'caller-name'|Type $type Specifies the type of number lookup to be performed
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        string|Type|null $type = null,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupGetResponse;
}
