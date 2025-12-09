<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberLookup\NumberLookupGetResponse;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberLookupContract;

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
     * @param 'carrier'|'caller-name'|Type $type Specifies the type of number lookup to be performed
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        string|Type|null $type = null,
        ?RequestOptions $requestOptions = null,
    ): NumberLookupGetResponse {
        $params = ['type' => $type];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
