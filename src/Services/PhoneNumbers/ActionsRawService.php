<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusParams;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyParams;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipParams;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbers\ActionsRawContract;

/**
 * Configure your phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Change the bundle status for a phone number (set to being in a bundle or remove from a bundle)
     *
     * @param string $id identifies the resource
     * @param array{bundleID: string}|ActionChangeBundleStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionChangeBundleStatusResponse>
     *
     * @throws APIException
     */
    public function changeBundleStatus(
        string $id,
        array|ActionChangeBundleStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionChangeBundleStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param array{
     *   emergencyAddressID: string, emergencyEnabled: bool
     * }|ActionEnableEmergencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionEnableEmergencyResponse>
     *
     * @throws APIException
     */
    public function enableEmergency(
        string $id,
        array|ActionEnableEmergencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionEnableEmergencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{phoneNumbers: list<string>}|ActionVerifyOwnershipParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionVerifyOwnershipResponse>
     *
     * @throws APIException
     */
    public function verifyOwnership(
        array|ActionVerifyOwnershipParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionVerifyOwnershipParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'phone_numbers/actions/verify_ownership',
            body: (object) $parsed,
            options: $options,
            convert: ActionVerifyOwnershipResponse::class,
        );
    }
}
