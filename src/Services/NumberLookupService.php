<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberLookupContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberLookupService implements NumberLookupContract
{
    /**
     * @api
     */
    public NumberLookupRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberLookupRawService($client);
    }

    /**
     * @api
     *
     * Returns information about the provided phone number.
     *
     * @param string $phoneNumber The phone number to be looked up
     * @param Type|value-of<Type> $type Specifies the type of number lookup to be performed
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberLookupGetResponse {
        $params = Util::removeNulls(['type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
