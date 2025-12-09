<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberLookupRawContract;

final class NumberLookupRawService implements NumberLookupRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns information about the provided phone number.
     *
     * @param string $phoneNumber The phone number to be looked up
     * @param array{
     *   type?: 'carrier'|'caller-name'|Type
     * }|NumberLookupRetrieveParams $params
     *
     * @return BaseResponse<NumberLookupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberLookupRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberLookupRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['number_lookup/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
            convert: NumberLookupGetResponse::class,
        );
    }
}
