<?php

declare(strict_types=1);

namespace Telnyx\Services\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsParams;
use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateParams;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Addresses\ActionsContract;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Accepts this address suggestion as a new emergency address for Operator Connect and finishes the uploads of the numbers associated with it to Microsoft.
     *
     * @param string $id1 the ID of the address
     *
     * @return ActionAcceptSuggestionsResponse<HasRawResponse>
     */
    public function acceptSuggestions(
        string $id,
        $id1 = omit,
        ?RequestOptions $requestOptions = null
    ): ActionAcceptSuggestionsResponse {
        [$parsed, $options] = ActionAcceptSuggestionsParams::parseRequest(
            ['id' => $id1],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['addresses/%1$s/actions/accept_suggestions', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionAcceptSuggestionsResponse::class,
        );
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
     * @return ActionValidateResponse<HasRawResponse>
     */
    public function validate(
        $countryCode,
        $postalCode,
        $streetAddress,
        $administrativeArea = omit,
        $extendedAddress = omit,
        $locality = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionValidateResponse {
        [$parsed, $options] = ActionValidateParams::parseRequest(
            [
                'countryCode' => $countryCode,
                'postalCode' => $postalCode,
                'streetAddress' => $streetAddress,
                'administrativeArea' => $administrativeArea,
                'extendedAddress' => $extendedAddress,
                'locality' => $locality,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'addresses/actions/validate',
            body: (object) $parsed,
            options: $options,
            convert: ActionValidateResponse::class,
        );
    }
}
