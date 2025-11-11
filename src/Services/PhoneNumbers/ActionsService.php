<?php

declare(strict_types=1);

namespace Telnyx\Services\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @param array{bundle_id: string}|ActionChangeBundleStatusParams $params
     *
     * @throws APIException
     */
    public function changeBundleStatus(
        string $id,
        array|ActionChangeBundleStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionChangeBundleStatusResponse {
        [$parsed, $options] = ActionChangeBundleStatusParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   emergency_address_id: string, emergency_enabled: bool
     * }|ActionEnableEmergencyParams $params
     *
     * @throws APIException
     */
    public function enableEmergency(
        string $id,
        array|ActionEnableEmergencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEnableEmergencyResponse {
        [$parsed, $options] = ActionEnableEmergencyParams::parseRequest(
            $params,
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
     * @param array{phone_numbers: list<string>}|ActionVerifyOwnershipParams $params
     *
     * @throws APIException
     */
    public function verifyOwnership(
        array|ActionVerifyOwnershipParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionVerifyOwnershipResponse {
        [$parsed, $options] = ActionVerifyOwnershipParams::parseRequest(
            $params,
            $requestOptions,
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
