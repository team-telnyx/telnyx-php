<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserProfileRawContract;
use Telnyx\UserProfile\UserProfileListResponse;
use Telnyx\UserProfile\UserProfilePatchAllParams;
use Telnyx\UserProfile\UserProfilePatchAllParams\DataLocality;
use Telnyx\UserProfile\UserProfilePatchAllParams\LowBalanceNotificationFrequency;
use Telnyx\UserProfile\UserProfilePatchAllParams\UiTheme;
use Telnyx\UserProfile\UserProfilePatchAllResponse;

/**
 * Read and update the authenticated user's profile and data locality.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UserProfileRawService implements UserProfileRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the authenticated user's profile, including data locality and migration status.
     *
     * **Beta:** this API should be considered a beta integration target because it may change if user account settings require changes
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserProfileListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'user_profile',
            options: $requestOptions,
            convert: UserProfileListResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the authenticated user's profile using top-level JSON fields. Returns the updated profile.
     *
     * **Beta:** this API should be considered a beta integration target because it may change if user account settings require changes
     *
     * @param array{
     *   address1?: string|null,
     *   address2?: string|null,
     *   businessName?: string|null,
     *   city?: string|null,
     *   companySize?: string,
     *   country?: string|null,
     *   dataLocality?: DataLocality|value-of<DataLocality>,
     *   defaultManagedAccountAllowCustomPricing?: bool,
     *   defaultManagedAccountInheritEmergencyTermsOfService?: bool,
     *   defaultManagedAccountRollupBilling?: bool,
     *   defaultNotifyManagerAccount?: bool,
     *   defaultNumbersExternalPin?: string,
     *   firstName?: string|null,
     *   gotFreeNumberAtSignup?: bool,
     *   lastName?: string|null,
     *   lowBalanceNotificationFrequency?: LowBalanceNotificationFrequency|value-of<LowBalanceNotificationFrequency>|null,
     *   lowBalanceThresholdAmount?: float|null,
     *   notifyOnInvoiceAvailable?: bool,
     *   notifyOnInvoicePayment?: bool,
     *   npacUser?: bool,
     *   onboardingBuildMethod?: list<string>,
     *   onboardingIndustries?: list<string>,
     *   onboardingMonthlyBudget?: list<string>,
     *   onboardingProductInterest?: list<string>,
     *   onboardingProjectTypes?: list<string>,
     *   onboardingReasonsForConsideration?: list<string>,
     *   onboardingReferrer?: list<string>,
     *   onboardingUseCasesOther?: list<string>,
     *   phoneNumber?: string|null,
     *   portOutPinValidation?: bool,
     *   primaryUseCase?: string,
     *   role?: string,
     *   state?: string|null,
     *   uiTheme?: UiTheme|value-of<UiTheme>,
     *   useCases?: list<string>,
     *   userSubscriptionOptIn?: bool,
     *   zip?: string|null,
     * }|UserProfilePatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserProfilePatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        array|UserProfilePatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserProfilePatchAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: 'user_profile',
            body: (object) $parsed,
            options: $options,
            convert: UserProfilePatchAllResponse::class,
        );
    }
}
