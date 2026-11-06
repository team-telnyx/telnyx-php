<?php

declare(strict_types=1);

namespace Telnyx\UserProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\UserProfile\UserProfilePatchAllParams\DataLocality;
use Telnyx\UserProfile\UserProfilePatchAllParams\LowBalanceNotificationFrequency;
use Telnyx\UserProfile\UserProfilePatchAllParams\UiTheme;

/**
 * Update the authenticated user's profile using top-level JSON fields. Returns the updated profile.
 *
 * **Beta:** this API should be considered a beta integration target because it may change if user account settings require changes
 *
 * @see Telnyx\Services\UserProfileService::patchAll()
 *
 * @phpstan-type UserProfilePatchAllParamsShape = array{
 *   address1?: string|null,
 *   address2?: string|null,
 *   businessName?: string|null,
 *   city?: string|null,
 *   companySize?: string|null,
 *   country?: string|null,
 *   dataLocality?: null|DataLocality|value-of<DataLocality>,
 *   defaultManagedAccountAllowCustomPricing?: bool|null,
 *   defaultManagedAccountInheritEmergencyTermsOfService?: bool|null,
 *   defaultManagedAccountRollupBilling?: bool|null,
 *   defaultNotifyManagerAccount?: bool|null,
 *   defaultNumbersExternalPin?: string|null,
 *   firstName?: string|null,
 *   gotFreeNumberAtSignup?: bool|null,
 *   lastName?: string|null,
 *   lowBalanceNotificationFrequency?: null|LowBalanceNotificationFrequency|value-of<LowBalanceNotificationFrequency>,
 *   lowBalanceThresholdAmount?: float|null,
 *   notifyOnInvoiceAvailable?: bool|null,
 *   notifyOnInvoicePayment?: bool|null,
 *   npacUser?: bool|null,
 *   onboardingBuildMethod?: list<string>|null,
 *   onboardingIndustries?: list<string>|null,
 *   onboardingMonthlyBudget?: list<string>|null,
 *   onboardingProductInterest?: list<string>|null,
 *   onboardingProjectTypes?: list<string>|null,
 *   onboardingReasonsForConsideration?: list<string>|null,
 *   onboardingReferrer?: list<string>|null,
 *   onboardingUseCasesOther?: list<string>|null,
 *   phoneNumber?: string|null,
 *   portOutPinValidation?: bool|null,
 *   primaryUseCase?: string|null,
 *   role?: string|null,
 *   state?: string|null,
 *   uiTheme?: null|UiTheme|value-of<UiTheme>,
 *   useCases?: list<string>|null,
 *   userSubscriptionOptIn?: bool|null,
 *   zip?: string|null,
 * }
 */
final class UserProfilePatchAllParams implements BaseModel
{
    /** @use SdkModel<UserProfilePatchAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * First line of the profile address.
     */
    #[Optional('address_1', nullable: true)]
    public ?string $address1;

    /**
     * Second line of the profile address.
     */
    #[Optional('address_2', nullable: true)]
    public ?string $address2;

    /**
     * Business name associated with the profile.
     */
    #[Optional('business_name', nullable: true)]
    public ?string $businessName;

    /**
     * City in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $city;

    /**
     * Company size reported by the user.
     */
    #[Optional('company_size')]
    public ?string $companySize;

    /**
     * Country code in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $country;

    /**
     * Data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada). A change is permitted only if data locality has not previously been changed. A successful change sets data_locality_updated_at and initializes data_locality_migration_status to not_started.
     *
     * @var value-of<DataLocality>|null $dataLocality
     */
    #[Optional('data_locality', enum: DataLocality::class)]
    public ?string $dataLocality;

    /**
     * Default custom-pricing setting for managed accounts.
     */
    #[Optional('default_managed_account_allow_custom_pricing')]
    public ?bool $defaultManagedAccountAllowCustomPricing;

    /**
     * Default emergency terms-of-service inheritance setting for managed accounts, where supported.
     */
    #[Optional('default_managed_account_inherit_emergency_terms_of_service')]
    public ?bool $defaultManagedAccountInheritEmergencyTermsOfService;

    /**
     * Default rollup-billing setting for managed accounts.
     */
    #[Optional('default_managed_account_rollup_billing')]
    public ?bool $defaultManagedAccountRollupBilling;

    /**
     * Default setting for notifying the manager account.
     */
    #[Optional('default_notify_manager_account')]
    public ?bool $defaultNotifyManagerAccount;

    /**
     * Default alphanumeric external PIN for phone numbers.
     */
    #[Optional('default_numbers_external_pin')]
    public ?string $defaultNumbersExternalPin;

    /**
     * The user's first name.
     */
    #[Optional('first_name', nullable: true)]
    public ?string $firstName;

    /**
     * Whether the user received a free number at signup.
     */
    #[Optional('got_free_number_at_signup')]
    public ?bool $gotFreeNumberAtSignup;

    /**
     * The user's last name.
     */
    #[Optional('last_name', nullable: true)]
    public ?string $lastName;

    /**
     * Low-balance notification frequency. Organization sub-users cannot set a non-null frequency. The resulting profile must have both a threshold and frequency, or neither.
     *
     * @var value-of<LowBalanceNotificationFrequency>|null $lowBalanceNotificationFrequency
     */
    #[Optional(
        'low_balance_notification_frequency',
        enum: LowBalanceNotificationFrequency::class,
        nullable: true,
    )]
    public ?int $lowBalanceNotificationFrequency;

    /**
     * Low-balance notification threshold in the billing currency. The resulting profile must have both a threshold and notification frequency, or neither.
     */
    #[Optional('low_balance_threshold_amount', nullable: true)]
    public ?float $lowBalanceThresholdAmount;

    /**
     * Whether to notify the user when an invoice is available.
     */
    #[Optional('notify_on_invoice_available')]
    public ?bool $notifyOnInvoiceAvailable;

    /**
     * Whether to notify the user when an invoice is paid.
     */
    #[Optional('notify_on_invoice_payment')]
    public ?bool $notifyOnInvoicePayment;

    /**
     * Whether the user is an NPAC user.
     */
    #[Optional('npac_user')]
    public ?bool $npacUser;

    /**
     * Build methods reported during onboarding.
     *
     * @var list<string>|null $onboardingBuildMethod
     */
    #[Optional('onboarding_build_method', list: 'string')]
    public ?array $onboardingBuildMethod;

    /**
     * Industries reported during onboarding.
     *
     * @var list<string>|null $onboardingIndustries
     */
    #[Optional('onboarding_industries', list: 'string')]
    public ?array $onboardingIndustries;

    /**
     * Monthly budget ranges reported during onboarding.
     *
     * @var list<string>|null $onboardingMonthlyBudget
     */
    #[Optional('onboarding_monthly_budget', list: 'string')]
    public ?array $onboardingMonthlyBudget;

    /**
     * Products of interest reported during onboarding.
     *
     * @var list<string>|null $onboardingProductInterest
     */
    #[Optional('onboarding_product_interest', list: 'string')]
    public ?array $onboardingProductInterest;

    /**
     * Onboarding project types.
     *
     * @var list<string>|null $onboardingProjectTypes
     */
    #[Optional('onboarding_project_types', list: 'string')]
    public ?array $onboardingProjectTypes;

    /**
     * Reasons for considering Telnyx.
     *
     * @var list<string>|null $onboardingReasonsForConsideration
     */
    #[Optional('onboarding_reasons_for_consideration', list: 'string')]
    public ?array $onboardingReasonsForConsideration;

    /**
     * Referral sources reported during onboarding.
     *
     * @var list<string>|null $onboardingReferrer
     */
    #[Optional('onboarding_referrer', list: 'string')]
    public ?array $onboardingReferrer;

    /**
     * Other onboarding use cases.
     *
     * @var list<string>|null $onboardingUseCasesOther
     */
    #[Optional('onboarding_use_cases_other', list: 'string')]
    public ?array $onboardingUseCasesOther;

    /**
     * Contact phone number associated with the profile.
     */
    #[Optional('phone_number', nullable: true)]
    public ?string $phoneNumber;

    /**
     * Whether port-out PIN validation is enabled.
     */
    #[Optional('port_out_pin_validation')]
    public ?bool $portOutPinValidation;

    /**
     * Primary use case for the account.
     */
    #[Optional('primary_use_case')]
    public ?string $primaryUseCase;

    /**
     * The user's role.
     */
    #[Optional]
    public ?string $role;

    /**
     * State or region in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $state;

    /**
     * User interface theme: 0 for dark or 1 for light.
     *
     * @var value-of<UiTheme>|null $uiTheme
     */
    #[Optional('ui_theme', enum: UiTheme::class)]
    public ?int $uiTheme;

    /**
     * Use cases reported by the user.
     *
     * @var list<string>|null $useCases
     */
    #[Optional('use_cases', list: 'string')]
    public ?array $useCases;

    /**
     * Whether the user opts in to subscriptions.
     */
    #[Optional('user_subscription_opt_in')]
    public ?bool $userSubscriptionOptIn;

    /**
     * Postal code in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $zip;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|LowBalanceNotificationFrequency|value-of<LowBalanceNotificationFrequency>|null $lowBalanceNotificationFrequency
     * @param DataLocality|value-of<DataLocality>|null $dataLocality
     * @param list<string>|null $onboardingBuildMethod
     * @param list<string>|null $onboardingIndustries
     * @param list<string>|null $onboardingMonthlyBudget
     * @param list<string>|null $onboardingProductInterest
     * @param list<string>|null $onboardingProjectTypes
     * @param list<string>|null $onboardingReasonsForConsideration
     * @param list<string>|null $onboardingReferrer
     * @param list<string>|null $onboardingUseCasesOther
     * @param UiTheme|value-of<UiTheme>|null $uiTheme
     * @param list<string>|null $useCases
     */
    public static function with(
        string|Omitted|null $address1 = Omitted::VALUE,
        string|Omitted|null $address2 = Omitted::VALUE,
        string|Omitted|null $businessName = Omitted::VALUE,
        string|Omitted|null $city = Omitted::VALUE,
        string|Omitted|null $country = Omitted::VALUE,
        string|Omitted|null $firstName = Omitted::VALUE,
        string|Omitted|null $lastName = Omitted::VALUE,
        Omitted|LowBalanceNotificationFrequency|int|null $lowBalanceNotificationFrequency = Omitted::VALUE,
        float|Omitted|null $lowBalanceThresholdAmount = Omitted::VALUE,
        string|Omitted|null $phoneNumber = Omitted::VALUE,
        string|Omitted|null $state = Omitted::VALUE,
        string|Omitted|null $zip = Omitted::VALUE,
        ?string $companySize = null,
        DataLocality|string|null $dataLocality = null,
        ?bool $defaultManagedAccountAllowCustomPricing = null,
        ?bool $defaultManagedAccountInheritEmergencyTermsOfService = null,
        ?bool $defaultManagedAccountRollupBilling = null,
        ?bool $defaultNotifyManagerAccount = null,
        ?string $defaultNumbersExternalPin = null,
        ?bool $gotFreeNumberAtSignup = null,
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
        ?bool $portOutPinValidation = null,
        ?string $primaryUseCase = null,
        ?string $role = null,
        UiTheme|int|null $uiTheme = null,
        ?array $useCases = null,
        ?bool $userSubscriptionOptIn = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $address1 && $self['address1'] = $address1;
        Omitted::VALUE !== $address2 && $self['address2'] = $address2;
        Omitted::VALUE !== $businessName && $self['businessName'] = $businessName;
        Omitted::VALUE !== $city && $self['city'] = $city;
        null !== $companySize && $self['companySize'] = $companySize;
        Omitted::VALUE !== $country && $self['country'] = $country;
        null !== $dataLocality && $self['dataLocality'] = $dataLocality;
        null !== $defaultManagedAccountAllowCustomPricing && $self['defaultManagedAccountAllowCustomPricing'] = $defaultManagedAccountAllowCustomPricing;
        null !== $defaultManagedAccountInheritEmergencyTermsOfService && $self['defaultManagedAccountInheritEmergencyTermsOfService'] = $defaultManagedAccountInheritEmergencyTermsOfService;
        null !== $defaultManagedAccountRollupBilling && $self['defaultManagedAccountRollupBilling'] = $defaultManagedAccountRollupBilling;
        null !== $defaultNotifyManagerAccount && $self['defaultNotifyManagerAccount'] = $defaultNotifyManagerAccount;
        null !== $defaultNumbersExternalPin && $self['defaultNumbersExternalPin'] = $defaultNumbersExternalPin;
        Omitted::VALUE !== $firstName && $self['firstName'] = $firstName;
        null !== $gotFreeNumberAtSignup && $self['gotFreeNumberAtSignup'] = $gotFreeNumberAtSignup;
        Omitted::VALUE !== $lastName && $self['lastName'] = $lastName;
        Omitted::VALUE !== $lowBalanceNotificationFrequency && $self['lowBalanceNotificationFrequency'] = $lowBalanceNotificationFrequency;
        Omitted::VALUE !== $lowBalanceThresholdAmount && $self['lowBalanceThresholdAmount'] = $lowBalanceThresholdAmount;
        null !== $notifyOnInvoiceAvailable && $self['notifyOnInvoiceAvailable'] = $notifyOnInvoiceAvailable;
        null !== $notifyOnInvoicePayment && $self['notifyOnInvoicePayment'] = $notifyOnInvoicePayment;
        null !== $npacUser && $self['npacUser'] = $npacUser;
        null !== $onboardingBuildMethod && $self['onboardingBuildMethod'] = $onboardingBuildMethod;
        null !== $onboardingIndustries && $self['onboardingIndustries'] = $onboardingIndustries;
        null !== $onboardingMonthlyBudget && $self['onboardingMonthlyBudget'] = $onboardingMonthlyBudget;
        null !== $onboardingProductInterest && $self['onboardingProductInterest'] = $onboardingProductInterest;
        null !== $onboardingProjectTypes && $self['onboardingProjectTypes'] = $onboardingProjectTypes;
        null !== $onboardingReasonsForConsideration && $self['onboardingReasonsForConsideration'] = $onboardingReasonsForConsideration;
        null !== $onboardingReferrer && $self['onboardingReferrer'] = $onboardingReferrer;
        null !== $onboardingUseCasesOther && $self['onboardingUseCasesOther'] = $onboardingUseCasesOther;
        Omitted::VALUE !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $portOutPinValidation && $self['portOutPinValidation'] = $portOutPinValidation;
        null !== $primaryUseCase && $self['primaryUseCase'] = $primaryUseCase;
        null !== $role && $self['role'] = $role;
        Omitted::VALUE !== $state && $self['state'] = $state;
        null !== $uiTheme && $self['uiTheme'] = $uiTheme;
        null !== $useCases && $self['useCases'] = $useCases;
        null !== $userSubscriptionOptIn && $self['userSubscriptionOptIn'] = $userSubscriptionOptIn;
        Omitted::VALUE !== $zip && $self['zip'] = $zip;

        return $self;
    }

    /**
     * First line of the profile address.
     */
    public function withAddress1(?string $address1): self
    {
        $self = clone $this;
        $self['address1'] = $address1;

        return $self;
    }

    /**
     * Second line of the profile address.
     */
    public function withAddress2(?string $address2): self
    {
        $self = clone $this;
        $self['address2'] = $address2;

        return $self;
    }

    /**
     * Business name associated with the profile.
     */
    public function withBusinessName(?string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    /**
     * City in the profile address.
     */
    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * Company size reported by the user.
     */
    public function withCompanySize(string $companySize): self
    {
        $self = clone $this;
        $self['companySize'] = $companySize;

        return $self;
    }

    /**
     * Country code in the profile address.
     */
    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada). A change is permitted only if data locality has not previously been changed. A successful change sets data_locality_updated_at and initializes data_locality_migration_status to not_started.
     *
     * @param DataLocality|value-of<DataLocality> $dataLocality
     */
    public function withDataLocality(DataLocality|string $dataLocality): self
    {
        $self = clone $this;
        $self['dataLocality'] = $dataLocality;

        return $self;
    }

    /**
     * Default custom-pricing setting for managed accounts.
     */
    public function withDefaultManagedAccountAllowCustomPricing(
        bool $defaultManagedAccountAllowCustomPricing
    ): self {
        $self = clone $this;
        $self['defaultManagedAccountAllowCustomPricing'] = $defaultManagedAccountAllowCustomPricing;

        return $self;
    }

    /**
     * Default emergency terms-of-service inheritance setting for managed accounts, where supported.
     */
    public function withDefaultManagedAccountInheritEmergencyTermsOfService(
        bool $defaultManagedAccountInheritEmergencyTermsOfService
    ): self {
        $self = clone $this;
        $self['defaultManagedAccountInheritEmergencyTermsOfService'] = $defaultManagedAccountInheritEmergencyTermsOfService;

        return $self;
    }

    /**
     * Default rollup-billing setting for managed accounts.
     */
    public function withDefaultManagedAccountRollupBilling(
        bool $defaultManagedAccountRollupBilling
    ): self {
        $self = clone $this;
        $self['defaultManagedAccountRollupBilling'] = $defaultManagedAccountRollupBilling;

        return $self;
    }

    /**
     * Default setting for notifying the manager account.
     */
    public function withDefaultNotifyManagerAccount(
        bool $defaultNotifyManagerAccount
    ): self {
        $self = clone $this;
        $self['defaultNotifyManagerAccount'] = $defaultNotifyManagerAccount;

        return $self;
    }

    /**
     * Default alphanumeric external PIN for phone numbers.
     */
    public function withDefaultNumbersExternalPin(
        string $defaultNumbersExternalPin
    ): self {
        $self = clone $this;
        $self['defaultNumbersExternalPin'] = $defaultNumbersExternalPin;

        return $self;
    }

    /**
     * The user's first name.
     */
    public function withFirstName(?string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * Whether the user received a free number at signup.
     */
    public function withGotFreeNumberAtSignup(bool $gotFreeNumberAtSignup): self
    {
        $self = clone $this;
        $self['gotFreeNumberAtSignup'] = $gotFreeNumberAtSignup;

        return $self;
    }

    /**
     * The user's last name.
     */
    public function withLastName(?string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Low-balance notification frequency. Organization sub-users cannot set a non-null frequency. The resulting profile must have both a threshold and frequency, or neither.
     *
     * @param LowBalanceNotificationFrequency|value-of<LowBalanceNotificationFrequency>|null $lowBalanceNotificationFrequency
     */
    public function withLowBalanceNotificationFrequency(
        LowBalanceNotificationFrequency|int|null $lowBalanceNotificationFrequency
    ): self {
        $self = clone $this;
        $self['lowBalanceNotificationFrequency'] = $lowBalanceNotificationFrequency;

        return $self;
    }

    /**
     * Low-balance notification threshold in the billing currency. The resulting profile must have both a threshold and notification frequency, or neither.
     */
    public function withLowBalanceThresholdAmount(
        ?float $lowBalanceThresholdAmount
    ): self {
        $self = clone $this;
        $self['lowBalanceThresholdAmount'] = $lowBalanceThresholdAmount;

        return $self;
    }

    /**
     * Whether to notify the user when an invoice is available.
     */
    public function withNotifyOnInvoiceAvailable(
        bool $notifyOnInvoiceAvailable
    ): self {
        $self = clone $this;
        $self['notifyOnInvoiceAvailable'] = $notifyOnInvoiceAvailable;

        return $self;
    }

    /**
     * Whether to notify the user when an invoice is paid.
     */
    public function withNotifyOnInvoicePayment(
        bool $notifyOnInvoicePayment
    ): self {
        $self = clone $this;
        $self['notifyOnInvoicePayment'] = $notifyOnInvoicePayment;

        return $self;
    }

    /**
     * Whether the user is an NPAC user.
     */
    public function withNpacUser(bool $npacUser): self
    {
        $self = clone $this;
        $self['npacUser'] = $npacUser;

        return $self;
    }

    /**
     * Build methods reported during onboarding.
     *
     * @param list<string> $onboardingBuildMethod
     */
    public function withOnboardingBuildMethod(
        array $onboardingBuildMethod
    ): self {
        $self = clone $this;
        $self['onboardingBuildMethod'] = $onboardingBuildMethod;

        return $self;
    }

    /**
     * Industries reported during onboarding.
     *
     * @param list<string> $onboardingIndustries
     */
    public function withOnboardingIndustries(array $onboardingIndustries): self
    {
        $self = clone $this;
        $self['onboardingIndustries'] = $onboardingIndustries;

        return $self;
    }

    /**
     * Monthly budget ranges reported during onboarding.
     *
     * @param list<string> $onboardingMonthlyBudget
     */
    public function withOnboardingMonthlyBudget(
        array $onboardingMonthlyBudget
    ): self {
        $self = clone $this;
        $self['onboardingMonthlyBudget'] = $onboardingMonthlyBudget;

        return $self;
    }

    /**
     * Products of interest reported during onboarding.
     *
     * @param list<string> $onboardingProductInterest
     */
    public function withOnboardingProductInterest(
        array $onboardingProductInterest
    ): self {
        $self = clone $this;
        $self['onboardingProductInterest'] = $onboardingProductInterest;

        return $self;
    }

    /**
     * Onboarding project types.
     *
     * @param list<string> $onboardingProjectTypes
     */
    public function withOnboardingProjectTypes(
        array $onboardingProjectTypes
    ): self {
        $self = clone $this;
        $self['onboardingProjectTypes'] = $onboardingProjectTypes;

        return $self;
    }

    /**
     * Reasons for considering Telnyx.
     *
     * @param list<string> $onboardingReasonsForConsideration
     */
    public function withOnboardingReasonsForConsideration(
        array $onboardingReasonsForConsideration
    ): self {
        $self = clone $this;
        $self['onboardingReasonsForConsideration'] = $onboardingReasonsForConsideration;

        return $self;
    }

    /**
     * Referral sources reported during onboarding.
     *
     * @param list<string> $onboardingReferrer
     */
    public function withOnboardingReferrer(array $onboardingReferrer): self
    {
        $self = clone $this;
        $self['onboardingReferrer'] = $onboardingReferrer;

        return $self;
    }

    /**
     * Other onboarding use cases.
     *
     * @param list<string> $onboardingUseCasesOther
     */
    public function withOnboardingUseCasesOther(
        array $onboardingUseCasesOther
    ): self {
        $self = clone $this;
        $self['onboardingUseCasesOther'] = $onboardingUseCasesOther;

        return $self;
    }

    /**
     * Contact phone number associated with the profile.
     */
    public function withPhoneNumber(?string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Whether port-out PIN validation is enabled.
     */
    public function withPortOutPinValidation(bool $portOutPinValidation): self
    {
        $self = clone $this;
        $self['portOutPinValidation'] = $portOutPinValidation;

        return $self;
    }

    /**
     * Primary use case for the account.
     */
    public function withPrimaryUseCase(string $primaryUseCase): self
    {
        $self = clone $this;
        $self['primaryUseCase'] = $primaryUseCase;

        return $self;
    }

    /**
     * The user's role.
     */
    public function withRole(string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    /**
     * State or region in the profile address.
     */
    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * User interface theme: 0 for dark or 1 for light.
     *
     * @param UiTheme|value-of<UiTheme> $uiTheme
     */
    public function withUiTheme(UiTheme|int $uiTheme): self
    {
        $self = clone $this;
        $self['uiTheme'] = $uiTheme;

        return $self;
    }

    /**
     * Use cases reported by the user.
     *
     * @param list<string> $useCases
     */
    public function withUseCases(array $useCases): self
    {
        $self = clone $this;
        $self['useCases'] = $useCases;

        return $self;
    }

    /**
     * Whether the user opts in to subscriptions.
     */
    public function withUserSubscriptionOptIn(bool $userSubscriptionOptIn): self
    {
        $self = clone $this;
        $self['userSubscriptionOptIn'] = $userSubscriptionOptIn;

        return $self;
    }

    /**
     * Postal code in the profile address.
     */
    public function withZip(?string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
