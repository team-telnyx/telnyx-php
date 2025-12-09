<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit a new tollfree verification request.
 *
 * @see Telnyx\Services\MessagingTollfree\Verification\RequestsService::create()
 *
 * @phpstan-type RequestCreateParamsShape = array{
 *   additionalInformation: string,
 *   businessAddr1: string,
 *   businessCity: string,
 *   businessContactEmail: string,
 *   businessContactFirstName: string,
 *   businessContactLastName: string,
 *   businessContactPhone: string,
 *   businessName: string,
 *   businessState: string,
 *   businessZip: string,
 *   corporateWebsite: string,
 *   isvReseller: string,
 *   messageVolume: Volume|value-of<Volume>,
 *   optInWorkflow: string,
 *   optInWorkflowImageURLs: list<URL|array{url: string}>,
 *   phoneNumbers: list<TfPhoneNumber|array{phoneNumber: string}>,
 *   productionMessageContent: string,
 *   useCase: UseCaseCategories|value-of<UseCaseCategories>,
 *   useCaseSummary: string,
 *   ageGatedContent?: bool,
 *   businessAddr2?: string,
 *   businessRegistrationCountry?: string|null,
 *   businessRegistrationNumber?: string|null,
 *   businessRegistrationType?: string|null,
 *   doingBusinessAs?: string|null,
 *   entityType?: null|TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>,
 *   helpMessageResponse?: string|null,
 *   optInConfirmationResponse?: string|null,
 *   optInKeywords?: string|null,
 *   privacyPolicyURL?: string|null,
 *   termsAndConditionURL?: string|null,
 *   webhookURL?: string,
 * }
 */
final class RequestCreateParams implements BaseModel
{
    /** @use SdkModel<RequestCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Any additional information.
     */
    #[Required]
    public string $additionalInformation;

    /**
     * Line 1 of the business address.
     */
    #[Required]
    public string $businessAddr1;

    /**
     * The city of the business address; the first letter should be capitalized.
     */
    #[Required]
    public string $businessCity;

    /**
     * The email address of the business contact.
     */
    #[Required]
    public string $businessContactEmail;

    /**
     * First name of the business contact; there are no specific requirements on formatting.
     */
    #[Required]
    public string $businessContactFirstName;

    /**
     * Last name of the business contact; there are no specific requirements on formatting.
     */
    #[Required]
    public string $businessContactLastName;

    /**
     * The phone number of the business contact in E.164 format.
     */
    #[Required]
    public string $businessContactPhone;

    /**
     * Name of the business; there are no specific formatting requirements.
     */
    #[Required]
    public string $businessName;

    /**
     * The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized.
     */
    #[Required]
    public string $businessState;

    /**
     * The ZIP code of the business address.
     */
    #[Required]
    public string $businessZip;

    /**
     * A URL, including the scheme, pointing to the corporate website.
     */
    #[Required]
    public string $corporateWebsite;

    /**
     * ISV name.
     */
    #[Required]
    public string $isvReseller;

    /**
     * Message Volume Enums.
     *
     * @var value-of<Volume> $messageVolume
     */
    #[Required(enum: Volume::class)]
    public string $messageVolume;

    /**
     * Human-readable description of how end users will opt into receiving messages from the given phone numbers.
     */
    #[Required]
    public string $optInWorkflow;

    /**
     * Images showing the opt-in workflow.
     *
     * @var list<URL> $optInWorkflowImageURLs
     */
    #[Required(list: URL::class)]
    public array $optInWorkflowImageURLs;

    /**
     * The phone numbers to request the verification of.
     *
     * @var list<TfPhoneNumber> $phoneNumbers
     */
    #[Required(list: TfPhoneNumber::class)]
    public array $phoneNumbers;

    /**
     * An example of a message that will be sent from the given phone numbers.
     */
    #[Required]
    public string $productionMessageContent;

    /**
     * Tollfree usecase categories.
     *
     * @var value-of<UseCaseCategories> $useCase
     */
    #[Required(enum: UseCaseCategories::class)]
    public string $useCase;

    /**
     * Human-readable summary of the desired use-case.
     */
    #[Required]
    public string $useCaseSummary;

    /**
     * Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     */
    #[Optional]
    public ?bool $ageGatedContent;

    /**
     * Line 2 of the business address.
     */
    #[Optional]
    public ?string $businessAddr2;

    /**
     * ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     */
    #[Optional(nullable: true)]
    public ?string $businessRegistrationCountry;

    /**
     * Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     */
    #[Optional(nullable: true)]
    public ?string $businessRegistrationNumber;

    /**
     * Type of business registration being provided. Required from January 2026.
     */
    #[Optional(nullable: true)]
    public ?string $businessRegistrationType;

    /**
     * Doing Business As (DBA) name if different from legal name.
     */
    #[Optional(nullable: true)]
    public ?string $doingBusinessAs;

    /**
     * Business entity classification.
     *
     * @var value-of<TollFreeVerificationEntityType>|null $entityType
     */
    #[Optional(enum: TollFreeVerificationEntityType::class, nullable: true)]
    public ?string $entityType;

    /**
     * The message returned when users text 'HELP'.
     */
    #[Optional(nullable: true)]
    public ?string $helpMessageResponse;

    /**
     * Message sent to users confirming their opt-in to receive messages.
     */
    #[Optional(nullable: true)]
    public ?string $optInConfirmationResponse;

    /**
     * Keywords used to collect and process consumer opt-ins.
     */
    #[Optional(nullable: true)]
    public ?string $optInKeywords;

    /**
     * URL pointing to the business's privacy policy. Plain string, no URL format validation.
     */
    #[Optional(nullable: true)]
    public ?string $privacyPolicyURL;

    /**
     * URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     */
    #[Optional(nullable: true)]
    public ?string $termsAndConditionURL;

    /**
     * URL that should receive webhooks relating to this verification request.
     */
    #[Optional('webhookUrl')]
    public ?string $webhookURL;

    /**
     * `new RequestCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestCreateParams::with(
     *   additionalInformation: ...,
     *   businessAddr1: ...,
     *   businessCity: ...,
     *   businessContactEmail: ...,
     *   businessContactFirstName: ...,
     *   businessContactLastName: ...,
     *   businessContactPhone: ...,
     *   businessName: ...,
     *   businessState: ...,
     *   businessZip: ...,
     *   corporateWebsite: ...,
     *   isvReseller: ...,
     *   messageVolume: ...,
     *   optInWorkflow: ...,
     *   optInWorkflowImageURLs: ...,
     *   phoneNumbers: ...,
     *   productionMessageContent: ...,
     *   useCase: ...,
     *   useCaseSummary: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequestCreateParams)
     *   ->withAdditionalInformation(...)
     *   ->withBusinessAddr1(...)
     *   ->withBusinessCity(...)
     *   ->withBusinessContactEmail(...)
     *   ->withBusinessContactFirstName(...)
     *   ->withBusinessContactLastName(...)
     *   ->withBusinessContactPhone(...)
     *   ->withBusinessName(...)
     *   ->withBusinessState(...)
     *   ->withBusinessZip(...)
     *   ->withCorporateWebsite(...)
     *   ->withIsvReseller(...)
     *   ->withMessageVolume(...)
     *   ->withOptInWorkflow(...)
     *   ->withOptInWorkflowImageURLs(...)
     *   ->withPhoneNumbers(...)
     *   ->withProductionMessageContent(...)
     *   ->withUseCase(...)
     *   ->withUseCaseSummary(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Volume|value-of<Volume> $messageVolume
     * @param list<URL|array{url: string}> $optInWorkflowImageURLs
     * @param list<TfPhoneNumber|array{phoneNumber: string}> $phoneNumbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null $entityType
     */
    public static function with(
        string $additionalInformation,
        string $businessAddr1,
        string $businessCity,
        string $businessContactEmail,
        string $businessContactFirstName,
        string $businessContactLastName,
        string $businessContactPhone,
        string $businessName,
        string $businessState,
        string $businessZip,
        string $corporateWebsite,
        string $isvReseller,
        Volume|string $messageVolume,
        string $optInWorkflow,
        array $optInWorkflowImageURLs,
        array $phoneNumbers,
        string $productionMessageContent,
        UseCaseCategories|string $useCase,
        string $useCaseSummary,
        ?bool $ageGatedContent = null,
        ?string $businessAddr2 = null,
        ?string $businessRegistrationCountry = null,
        ?string $businessRegistrationNumber = null,
        ?string $businessRegistrationType = null,
        ?string $doingBusinessAs = null,
        TollFreeVerificationEntityType|string|null $entityType = null,
        ?string $helpMessageResponse = null,
        ?string $optInConfirmationResponse = null,
        ?string $optInKeywords = null,
        ?string $privacyPolicyURL = null,
        ?string $termsAndConditionURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['additionalInformation'] = $additionalInformation;
        $self['businessAddr1'] = $businessAddr1;
        $self['businessCity'] = $businessCity;
        $self['businessContactEmail'] = $businessContactEmail;
        $self['businessContactFirstName'] = $businessContactFirstName;
        $self['businessContactLastName'] = $businessContactLastName;
        $self['businessContactPhone'] = $businessContactPhone;
        $self['businessName'] = $businessName;
        $self['businessState'] = $businessState;
        $self['businessZip'] = $businessZip;
        $self['corporateWebsite'] = $corporateWebsite;
        $self['isvReseller'] = $isvReseller;
        $self['messageVolume'] = $messageVolume;
        $self['optInWorkflow'] = $optInWorkflow;
        $self['optInWorkflowImageURLs'] = $optInWorkflowImageURLs;
        $self['phoneNumbers'] = $phoneNumbers;
        $self['productionMessageContent'] = $productionMessageContent;
        $self['useCase'] = $useCase;
        $self['useCaseSummary'] = $useCaseSummary;

        null !== $ageGatedContent && $self['ageGatedContent'] = $ageGatedContent;
        null !== $businessAddr2 && $self['businessAddr2'] = $businessAddr2;
        null !== $businessRegistrationCountry && $self['businessRegistrationCountry'] = $businessRegistrationCountry;
        null !== $businessRegistrationNumber && $self['businessRegistrationNumber'] = $businessRegistrationNumber;
        null !== $businessRegistrationType && $self['businessRegistrationType'] = $businessRegistrationType;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        null !== $entityType && $self['entityType'] = $entityType;
        null !== $helpMessageResponse && $self['helpMessageResponse'] = $helpMessageResponse;
        null !== $optInConfirmationResponse && $self['optInConfirmationResponse'] = $optInConfirmationResponse;
        null !== $optInKeywords && $self['optInKeywords'] = $optInKeywords;
        null !== $privacyPolicyURL && $self['privacyPolicyURL'] = $privacyPolicyURL;
        null !== $termsAndConditionURL && $self['termsAndConditionURL'] = $termsAndConditionURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Any additional information.
     */
    public function withAdditionalInformation(
        string $additionalInformation
    ): self {
        $self = clone $this;
        $self['additionalInformation'] = $additionalInformation;

        return $self;
    }

    /**
     * Line 1 of the business address.
     */
    public function withBusinessAddr1(string $businessAddr1): self
    {
        $self = clone $this;
        $self['businessAddr1'] = $businessAddr1;

        return $self;
    }

    /**
     * The city of the business address; the first letter should be capitalized.
     */
    public function withBusinessCity(string $businessCity): self
    {
        $self = clone $this;
        $self['businessCity'] = $businessCity;

        return $self;
    }

    /**
     * The email address of the business contact.
     */
    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $self = clone $this;
        $self['businessContactEmail'] = $businessContactEmail;

        return $self;
    }

    /**
     * First name of the business contact; there are no specific requirements on formatting.
     */
    public function withBusinessContactFirstName(
        string $businessContactFirstName
    ): self {
        $self = clone $this;
        $self['businessContactFirstName'] = $businessContactFirstName;

        return $self;
    }

    /**
     * Last name of the business contact; there are no specific requirements on formatting.
     */
    public function withBusinessContactLastName(
        string $businessContactLastName
    ): self {
        $self = clone $this;
        $self['businessContactLastName'] = $businessContactLastName;

        return $self;
    }

    /**
     * The phone number of the business contact in E.164 format.
     */
    public function withBusinessContactPhone(string $businessContactPhone): self
    {
        $self = clone $this;
        $self['businessContactPhone'] = $businessContactPhone;

        return $self;
    }

    /**
     * Name of the business; there are no specific formatting requirements.
     */
    public function withBusinessName(string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    /**
     * The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized.
     */
    public function withBusinessState(string $businessState): self
    {
        $self = clone $this;
        $self['businessState'] = $businessState;

        return $self;
    }

    /**
     * The ZIP code of the business address.
     */
    public function withBusinessZip(string $businessZip): self
    {
        $self = clone $this;
        $self['businessZip'] = $businessZip;

        return $self;
    }

    /**
     * A URL, including the scheme, pointing to the corporate website.
     */
    public function withCorporateWebsite(string $corporateWebsite): self
    {
        $self = clone $this;
        $self['corporateWebsite'] = $corporateWebsite;

        return $self;
    }

    /**
     * ISV name.
     */
    public function withIsvReseller(string $isvReseller): self
    {
        $self = clone $this;
        $self['isvReseller'] = $isvReseller;

        return $self;
    }

    /**
     * Message Volume Enums.
     *
     * @param Volume|value-of<Volume> $messageVolume
     */
    public function withMessageVolume(Volume|string $messageVolume): self
    {
        $self = clone $this;
        $self['messageVolume'] = $messageVolume;

        return $self;
    }

    /**
     * Human-readable description of how end users will opt into receiving messages from the given phone numbers.
     */
    public function withOptInWorkflow(string $optInWorkflow): self
    {
        $self = clone $this;
        $self['optInWorkflow'] = $optInWorkflow;

        return $self;
    }

    /**
     * Images showing the opt-in workflow.
     *
     * @param list<URL|array{url: string}> $optInWorkflowImageURLs
     */
    public function withOptInWorkflowImageURLs(
        array $optInWorkflowImageURLs
    ): self {
        $self = clone $this;
        $self['optInWorkflowImageURLs'] = $optInWorkflowImageURLs;

        return $self;
    }

    /**
     * The phone numbers to request the verification of.
     *
     * @param list<TfPhoneNumber|array{phoneNumber: string}> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * An example of a message that will be sent from the given phone numbers.
     */
    public function withProductionMessageContent(
        string $productionMessageContent
    ): self {
        $self = clone $this;
        $self['productionMessageContent'] = $productionMessageContent;

        return $self;
    }

    /**
     * Tollfree usecase categories.
     *
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase
     */
    public function withUseCase(UseCaseCategories|string $useCase): self
    {
        $self = clone $this;
        $self['useCase'] = $useCase;

        return $self;
    }

    /**
     * Human-readable summary of the desired use-case.
     */
    public function withUseCaseSummary(string $useCaseSummary): self
    {
        $self = clone $this;
        $self['useCaseSummary'] = $useCaseSummary;

        return $self;
    }

    /**
     * Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     */
    public function withAgeGatedContent(bool $ageGatedContent): self
    {
        $self = clone $this;
        $self['ageGatedContent'] = $ageGatedContent;

        return $self;
    }

    /**
     * Line 2 of the business address.
     */
    public function withBusinessAddr2(string $businessAddr2): self
    {
        $self = clone $this;
        $self['businessAddr2'] = $businessAddr2;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     */
    public function withBusinessRegistrationCountry(
        ?string $businessRegistrationCountry
    ): self {
        $self = clone $this;
        $self['businessRegistrationCountry'] = $businessRegistrationCountry;

        return $self;
    }

    /**
     * Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     */
    public function withBusinessRegistrationNumber(
        ?string $businessRegistrationNumber
    ): self {
        $self = clone $this;
        $self['businessRegistrationNumber'] = $businessRegistrationNumber;

        return $self;
    }

    /**
     * Type of business registration being provided. Required from January 2026.
     */
    public function withBusinessRegistrationType(
        ?string $businessRegistrationType
    ): self {
        $self = clone $this;
        $self['businessRegistrationType'] = $businessRegistrationType;

        return $self;
    }

    /**
     * Doing Business As (DBA) name if different from legal name.
     */
    public function withDoingBusinessAs(?string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

        return $self;
    }

    /**
     * Business entity classification.
     *
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null $entityType
     */
    public function withEntityType(
        TollFreeVerificationEntityType|string|null $entityType
    ): self {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    /**
     * The message returned when users text 'HELP'.
     */
    public function withHelpMessageResponse(?string $helpMessageResponse): self
    {
        $self = clone $this;
        $self['helpMessageResponse'] = $helpMessageResponse;

        return $self;
    }

    /**
     * Message sent to users confirming their opt-in to receive messages.
     */
    public function withOptInConfirmationResponse(
        ?string $optInConfirmationResponse
    ): self {
        $self = clone $this;
        $self['optInConfirmationResponse'] = $optInConfirmationResponse;

        return $self;
    }

    /**
     * Keywords used to collect and process consumer opt-ins.
     */
    public function withOptInKeywords(?string $optInKeywords): self
    {
        $self = clone $this;
        $self['optInKeywords'] = $optInKeywords;

        return $self;
    }

    /**
     * URL pointing to the business's privacy policy. Plain string, no URL format validation.
     */
    public function withPrivacyPolicyURL(?string $privacyPolicyURL): self
    {
        $self = clone $this;
        $self['privacyPolicyURL'] = $privacyPolicyURL;

        return $self;
    }

    /**
     * URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     */
    public function withTermsAndConditionURL(
        ?string $termsAndConditionURL
    ): self {
        $self = clone $this;
        $self['termsAndConditionURL'] = $termsAndConditionURL;

        return $self;
    }

    /**
     * URL that should receive webhooks relating to this verification request.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
