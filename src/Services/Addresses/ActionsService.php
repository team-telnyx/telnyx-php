<?php

declare(strict_types=1);

namespace Telnyx\Services\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Addresses\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Accepts this address suggestion as a new emergency address for Operator Connect and finishes the uploads of the numbers associated with it to Microsoft.
     *
     * @param string $id the UUID of the address that should be accepted
     * @param string $id1 the ID of the address
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $id,
        ?string $id1 = null,
        ?RequestOptions $requestOptions = null
    ): ActionAcceptSuggestionsResponse {
        $params = ['id' => $id1];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->acceptSuggestions($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Validates an address for emergency services.
     *
     * @param string $countryCode the two-character (ISO 3166-1 alpha-2) country code of the address
     * @param string $postalCode the postal code of the address
     * @param string $streetAddress the primary street address information about the address
     * @param string $administrativeArea The locality of the address. For US addresses, this corresponds to the state of the address.
     * @param string $extendedAddress additional street address information about the address such as, but not limited to, unit number or apartment number
     * @param string $locality The locality of the address. For US addresses, this corresponds to the city of the address.
     *
     * @throws APIException
     */
    public function validate(
        string $countryCode,
        string $postalCode,
        string $streetAddress,
        ?string $administrativeArea = null,
        ?string $extendedAddress = null,
        ?string $locality = null,
        ?RequestOptions $requestOptions = null,
    ): ActionValidateResponse {
        $params = [
            'countryCode' => $countryCode,
            'postalCode' => $postalCode,
            'streetAddress' => $streetAddress,
            'administrativeArea' => $administrativeArea,
            'extendedAddress' => $extendedAddress,
            'locality' => $locality,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
