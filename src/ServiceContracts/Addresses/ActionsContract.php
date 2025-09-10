<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id1 the ID of the address
     */
    public function acceptSuggestions(
        string $id,
        $id1 = omit,
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
     */
    public function validate(
        $countryCode,
        $postalCode,
        $streetAddress,
        $administrativeArea = omit,
        $extendedAddress = omit,
        $locality = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionValidateResponse;
}
