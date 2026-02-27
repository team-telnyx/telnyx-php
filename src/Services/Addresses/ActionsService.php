<?php

declare(strict_types=1);

namespace Telnyx\Services\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Addresses\ActionsContract;

/**
 * Operations to work with Address records. Address records are emergency-validated addresses meant to be associated with phone numbers. They are validated for emergency usage purposes at creation time, although you may validate them separately with a custom workflow using the ValidateAddress operation separately. Address records are not usable for physical orders, such as for Telnyx SIM cards, please use UserAddress for that. It is not possible to entirely skip emergency service validation for Address records; if an emergency provider for a phone number rejects the address then it cannot be used on a phone number. To prevent records from getting out of sync, Address records are immutable and cannot be altered once created. If you realize you need to alter an address, a new record must be created with the differing address.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param string $addressUuid the UUID of the address that should be accepted
     * @param string $id the ID of the address
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $addressUuid,
        ?string $id = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionAcceptSuggestionsResponse {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->acceptSuggestions($addressUuid, params: $params, requestOptions: $requestOptions);

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
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): ActionValidateResponse {
        $params = Util::removeNulls(
            [
                'countryCode' => $countryCode,
                'postalCode' => $postalCode,
                'streetAddress' => $streetAddress,
                'administrativeArea' => $administrativeArea,
                'extendedAddress' => $extendedAddress,
                'locality' => $locality,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
