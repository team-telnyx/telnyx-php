<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberLookupContract
{
    /**
     * @api
     *
     * @param string $phoneNumber The phone number to be looked up
     * @param Type|value-of<Type> $type Specifies the type of number lookup to be performed. May be supplied more than once to request several data sources in a single call (for example, `?type=carrier&type=enhanced-caller-name`). Each requested type populates the corresponding object in the response.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberLookupGetResponse;
}
