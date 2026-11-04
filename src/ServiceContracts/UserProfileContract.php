<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\UserProfile\UserProfileListResponse;
use Telnyx\UserProfile\UserProfilePatchAllParams\DataLocality;
use Telnyx\UserProfile\UserProfilePatchAllParams\LowBalanceNotificationFrequency;
use Telnyx\UserProfile\UserProfilePatchAllParams\UiTheme;
use Telnyx\UserProfile\UserProfilePatchAllResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserProfileContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): UserProfileListResponse;

    /**
     * @api
     *
     * @param string|Omitted|null $address1 first line of the profile address
     * @param string|Omitted|null $address2 second line of the profile address
     * @param string|Omitted|null $businessName business name associated with the profile
     * @param string|Omitted|null $city city in the profile address
     * @param string $companySize company size reported by the user
     * @param string|Omitted|null $country country code in the profile address
     * @param DataLocality|value-of<DataLocality> $dataLocality Data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada). A change is permitted only if data locality has not previously been changed. A successful change sets data_locality_updated_at and initializes data_locality_migration_status to not_started.
     * @param bool $defaultManagedAccountAllowCustomPricing default custom-pricing setting for managed accounts
     * @param bool $defaultManagedAccountInheritEmergencyTermsOfService default emergency terms-of-service inheritance setting for managed accounts, where supported
     * @param bool $defaultManagedAccountRollupBilling default rollup-billing setting for managed accounts
     * @param bool $defaultNotifyManagerAccount default setting for notifying the manager account
     * @param string $defaultNumbersExternalPin default alphanumeric external PIN for phone numbers
     * @param string|Omitted|null $firstName the user's first name
     * @param bool $gotFreeNumberAtSignup whether the user received a free number at signup
     * @param string|Omitted|null $lastName the user's last name
     * @param Omitted|LowBalanceNotificationFrequency|value-of<LowBalanceNotificationFrequency>|null $lowBalanceNotificationFrequency Low-balance notification frequency. Organization sub-users cannot set a non-null frequency. The resulting profile must have both a threshold and frequency, or neither.
     * @param float|Omitted|null $lowBalanceThresholdAmount Low-balance notification threshold in the billing currency. The resulting profile must have both a threshold and notification frequency, or neither.
     * @param bool $notifyOnInvoiceAvailable whether to notify the user when an invoice is available
     * @param bool $notifyOnInvoicePayment whether to notify the user when an invoice is paid
     * @param bool $npacUser whether the user is an NPAC user
     * @param list<string> $onboardingBuildMethod build methods reported during onboarding
     * @param list<string> $onboardingIndustries industries reported during onboarding
     * @param list<string> $onboardingMonthlyBudget monthly budget ranges reported during onboarding
     * @param list<string> $onboardingProductInterest products of interest reported during onboarding
     * @param list<string> $onboardingProjectTypes onboarding project types
     * @param list<string> $onboardingReasonsForConsideration reasons for considering Telnyx
     * @param list<string> $onboardingReferrer referral sources reported during onboarding
     * @param list<string> $onboardingUseCasesOther other onboarding use cases
     * @param string|Omitted|null $phoneNumber contact phone number associated with the profile
     * @param bool $portOutPinValidation whether port-out PIN validation is enabled
     * @param string $primaryUseCase primary use case for the account
     * @param string $role the user's role
     * @param string|Omitted|null $state state or region in the profile address
     * @param UiTheme|value-of<UiTheme> $uiTheme user interface theme: 0 for dark or 1 for light
     * @param list<string> $useCases use cases reported by the user
     * @param bool $userSubscriptionOptIn whether the user opts in to subscriptions
     * @param string|Omitted|null $zip postal code in the profile address
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patchAll(
        string|Omitted|null $address1 = Omitted::VALUE,
        string|Omitted|null $address2 = Omitted::VALUE,
        string|Omitted|null $businessName = Omitted::VALUE,
        string|Omitted|null $city = Omitted::VALUE,
        ?string $companySize = null,
        string|Omitted|null $country = Omitted::VALUE,
        DataLocality|string|null $dataLocality = null,
        ?bool $defaultManagedAccountAllowCustomPricing = null,
        ?bool $defaultManagedAccountInheritEmergencyTermsOfService = null,
        ?bool $defaultManagedAccountRollupBilling = null,
        ?bool $defaultNotifyManagerAccount = null,
        ?string $defaultNumbersExternalPin = null,
        string|Omitted|null $firstName = Omitted::VALUE,
        ?bool $gotFreeNumberAtSignup = null,
        string|Omitted|null $lastName = Omitted::VALUE,
        Omitted|LowBalanceNotificationFrequency|int|null $lowBalanceNotificationFrequency = Omitted::VALUE,
        float|Omitted|null $lowBalanceThresholdAmount = Omitted::VALUE,
        ?bool $notifyOnInvoiceAvailable = null,
        ?bool $notifyOnInvoicePayment = null,
        ?bool $npacUser = null,
        ?array $onboardingBuildMethod = null,
        ?array $onboardingIndustries = null,
        ?array $onboardingMonthlyBudget = null,
        ?array $onboardingProductInterest = null,
        ?array $onboardingProjectTypes = null,
        ?array $onboardingReasonsForConsideration = null,
        ?array $onboardingReferrer = null,
        ?array $onboardingUseCasesOther = null,
        string|Omitted|null $phoneNumber = Omitted::VALUE,
        ?bool $portOutPinValidation = null,
        ?string $primaryUseCase = null,
        ?string $role = null,
        string|Omitted|null $state = Omitted::VALUE,
        UiTheme|int|null $uiTheme = null,
        ?array $useCases = null,
        ?bool $userSubscriptionOptIn = null,
        string|Omitted|null $zip = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): UserProfilePatchAllResponse;
}
