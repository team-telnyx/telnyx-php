<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $bundleID The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function changeBundleStatus(
        string $id,
        string $bundleID,
        RequestOptions|array|null $requestOptions = null,
    ): ActionChangeBundleStatusResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $emergencyAddressID identifies the address to be used with emergency services
     * @param bool $emergencyEnabled indicates whether to enable emergency services on this number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enableEmergency(
        string $id,
        string $emergencyAddressID,
        bool $emergencyEnabled,
        RequestOptions|array|null $requestOptions = null,
    ): ActionEnableEmergencyResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers Array of phone numbers to verify ownership for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verifyOwnership(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): ActionVerifyOwnershipResponse;
}
