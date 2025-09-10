<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusParams;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyParams;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipParams;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Change the bundle status for a phone number (set to being in a bundle or remove from a bundle)
     *
     * @param string $bundleID The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     */
    public function changeBundleStatus(
        string $id,
        $bundleID,
        ?RequestOptions $requestOptions = null
    ): ActionChangeBundleStatusResponse {
        [$parsed, $options] = ActionChangeBundleStatusParams::parseRequest(
            ['bundleID' => $bundleID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s/actions/bundle_status_change', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionChangeBundleStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Enable emergency for a phone number
     *
     * @param string $emergencyAddressID identifies the address to be used with emergency services
     * @param bool $emergencyEnabled indicates whether to enable emergency services on this number
     */
    public function enableEmergency(
        string $id,
        $emergencyAddressID,
        $emergencyEnabled,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableEmergencyResponse {
        [$parsed, $options] = ActionEnableEmergencyParams::parseRequest(
            [
                'emergencyAddressID' => $emergencyAddressID,
                'emergencyEnabled' => $emergencyEnabled,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['phone_numbers/%1$s/actions/enable_emergency', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionEnableEmergencyResponse::class,
        );
    }

    /**
     * @api
     *
     * Verifies ownership of the provided phone numbers and returns a mapping of numbers to their IDs, plus a list of numbers not found in the account.
     *
     * @param list<string> $phoneNumbers Array of phone numbers to verify ownership for
     */
    public function verifyOwnership(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): ActionVerifyOwnershipResponse {
        [$parsed, $options] = ActionVerifyOwnershipParams::parseRequest(
            ['phoneNumbers' => $phoneNumbers],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/actions/verify_ownership',
            body: (object) $parsed,
            options: $options,
            convert: ActionVerifyOwnershipResponse::class,
        );
    }
}
