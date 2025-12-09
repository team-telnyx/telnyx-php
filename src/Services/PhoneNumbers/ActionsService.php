<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\ActionsContract;

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
     * Change the bundle status for a phone number (set to being in a bundle or remove from a bundle)
     *
     * @param string $id identifies the resource
     * @param string $bundleID The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     *
     * @throws APIException
     */
    public function changeBundleStatus(
        string $id,
        string $bundleID,
        ?RequestOptions $requestOptions = null
    ): ActionChangeBundleStatusResponse {
        $params = ['bundleID' => $bundleID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->changeBundleStatus($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Enable emergency for a phone number
     *
     * @param string $id identifies the resource
     * @param string $emergencyAddressID identifies the address to be used with emergency services
     * @param bool $emergencyEnabled indicates whether to enable emergency services on this number
     *
     * @throws APIException
     */
    public function enableEmergency(
        string $id,
        string $emergencyAddressID,
        bool $emergencyEnabled,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableEmergencyResponse {
        $params = [
            'emergencyAddressID' => $emergencyAddressID,
            'emergencyEnabled' => $emergencyEnabled,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enableEmergency($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Verifies ownership of the provided phone numbers and returns a mapping of numbers to their IDs, plus a list of numbers not found in the account.
     *
     * @param list<string> $phoneNumbers Array of phone numbers to verify ownership for
     *
     * @throws APIException
     */
    public function verifyOwnership(
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): ActionVerifyOwnershipResponse {
        $params = ['phoneNumbers' => $phoneNumbers];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verifyOwnership(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
