<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NumberLookupContract
{
    /**
     * @api
     *
     * @param Type|value-of<Type> $type Specifies the type of number lookup to be performed
     *
     * @return NumberLookupGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $phoneNumber,
        $type = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupGetResponse;
}
