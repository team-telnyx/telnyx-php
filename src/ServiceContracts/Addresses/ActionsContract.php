<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id_ the UUID of the address that should be accepted
     * @param string $id the ID of the address
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $id_,
        ?string $id = null,
        ?RequestOptions $requestOptions = null
    ): ActionAcceptSuggestionsResponse;

    /**
     * @api
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
    ): ActionValidateResponse;
}
