<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberLookupContract;

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
     * @param array{type?: "carrier"|"caller-name"}|NumberLookupRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberLookupRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupGetResponse {
        [$parsed, $options] = NumberLookupRetrieveParams::parseRequest(
            $params,
            $requestOptions,
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
