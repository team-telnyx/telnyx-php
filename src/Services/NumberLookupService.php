<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberLookupContract;

use const Telnyx\Core\OMIT as omit;

final class NumberLookupService implements NumberLookupContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns information about the provided phone number.
     *
     * @param Type|value-of<Type> $type Specifies the type of number lookup to be performed
     *
     * @return NumberLookupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        $type = omit,
        ?RequestOptions $requestOptions = null
    ): NumberLookupGetResponse {
        $params = ['type' => $type];

        return $this->retrieveRaw($phoneNumber, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberLookupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumberLookupGetResponse {
        [$parsed, $options] = NumberLookupRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['number_lookup/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
            convert: NumberLookupGetResponse::class,
        );
    }
}
