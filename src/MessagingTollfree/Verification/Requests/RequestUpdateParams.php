<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an existing tollfree verification request. This is particularly useful when there are pending customer actions to be taken.
 *
 * @see Telnyx\Services\MessagingTollfree\Verification\RequestsService::update()
 *
 * @phpstan-type RequestUpdateParamsShape = array{
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
final class RequestUpdateParams implements BaseModel
{
    /** @use SdkModel<RequestUpdateParamsShape> */
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
     * `new RequestUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestUpdateParams::with(
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
     * (new RequestUpdateParams)
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
        $obj = new self;

        $obj['additionalInformation'] = $additionalInformation;
        $obj['businessAddr1'] = $businessAddr1;
        $obj['businessCity'] = $businessCity;
        $obj['businessContactEmail'] = $businessContactEmail;
        $obj['businessContactFirstName'] = $businessContactFirstName;
        $obj['businessContactLastName'] = $businessContactLastName;
        $obj['businessContactPhone'] = $businessContactPhone;
        $obj['businessName'] = $businessName;
        $obj['businessState'] = $businessState;
        $obj['businessZip'] = $businessZip;
        $obj['corporateWebsite'] = $corporateWebsite;
        $obj['isvReseller'] = $isvReseller;
        $obj['messageVolume'] = $messageVolume;
        $obj['optInWorkflow'] = $optInWorkflow;
        $obj['optInWorkflowImageURLs'] = $optInWorkflowImageURLs;
        $obj['phoneNumbers'] = $phoneNumbers;
        $obj['productionMessageContent'] = $productionMessageContent;
        $obj['useCase'] = $useCase;
        $obj['useCaseSummary'] = $useCaseSummary;

        null !== $ageGatedContent && $obj['ageGatedContent'] = $ageGatedContent;
        null !== $businessAddr2 && $obj['businessAddr2'] = $businessAddr2;
        null !== $businessRegistrationCountry && $obj['businessRegistrationCountry'] = $businessRegistrationCountry;
        null !== $businessRegistrationNumber && $obj['businessRegistrationNumber'] = $businessRegistrationNumber;
        null !== $businessRegistrationType && $obj['businessRegistrationType'] = $businessRegistrationType;
        null !== $doingBusinessAs && $obj['doingBusinessAs'] = $doingBusinessAs;
        null !== $entityType && $obj['entityType'] = $entityType;
        null !== $helpMessageResponse && $obj['helpMessageResponse'] = $helpMessageResponse;
        null !== $optInConfirmationResponse && $obj['optInConfirmationResponse'] = $optInConfirmationResponse;
        null !== $optInKeywords && $obj['optInKeywords'] = $optInKeywords;
        null !== $privacyPolicyURL && $obj['privacyPolicyURL'] = $privacyPolicyURL;
        null !== $termsAndConditionURL && $obj['termsAndConditionURL'] = $termsAndConditionURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * Any additional information.
     */
    public function withAdditionalInformation(
        string $additionalInformation
    ): self {
        $obj = clone $this;
        $obj['additionalInformation'] = $additionalInformation;

        return $obj;
    }

    /**
     * Line 1 of the business address.
     */
    public function withBusinessAddr1(string $businessAddr1): self
    {
        $obj = clone $this;
        $obj['businessAddr1'] = $businessAddr1;

        return $obj;
    }

    /**
     * The city of the business address; the first letter should be capitalized.
     */
    public function withBusinessCity(string $businessCity): self
    {
        $obj = clone $this;
        $obj['businessCity'] = $businessCity;

        return $obj;
    }

    /**
     * The email address of the business contact.
     */
    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $obj = clone $this;
        $obj['businessContactEmail'] = $businessContactEmail;

        return $obj;
    }

    /**
     * First name of the business contact; there are no specific requirements on formatting.
     */
    public function withBusinessContactFirstName(
        string $businessContactFirstName
    ): self {
        $obj = clone $this;
        $obj['businessContactFirstName'] = $businessContactFirstName;

        return $obj;
    }

    /**
     * Last name of the business contact; there are no specific requirements on formatting.
     */
    public function withBusinessContactLastName(
        string $businessContactLastName
    ): self {
        $obj = clone $this;
        $obj['businessContactLastName'] = $businessContactLastName;

        return $obj;
    }

    /**
     * The phone number of the business contact in E.164 format.
     */
    public function withBusinessContactPhone(string $businessContactPhone): self
    {
        $obj = clone $this;
        $obj['businessContactPhone'] = $businessContactPhone;

        return $obj;
    }

    /**
     * Name of the business; there are no specific formatting requirements.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['businessName'] = $businessName;

        return $obj;
    }

    /**
     * The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized.
     */
    public function withBusinessState(string $businessState): self
    {
        $obj = clone $this;
        $obj['businessState'] = $businessState;

        return $obj;
    }

    /**
     * The ZIP code of the business address.
     */
    public function withBusinessZip(string $businessZip): self
    {
        $obj = clone $this;
        $obj['businessZip'] = $businessZip;

        return $obj;
    }

    /**
     * A URL, including the scheme, pointing to the corporate website.
     */
    public function withCorporateWebsite(string $corporateWebsite): self
    {
        $obj = clone $this;
        $obj['corporateWebsite'] = $corporateWebsite;

        return $obj;
    }

    /**
     * ISV name.
     */
    public function withIsvReseller(string $isvReseller): self
    {
        $obj = clone $this;
        $obj['isvReseller'] = $isvReseller;

        return $obj;
    }

    /**
     * Message Volume Enums.
     *
     * @param Volume|value-of<Volume> $messageVolume
     */
    public function withMessageVolume(Volume|string $messageVolume): self
    {
        $obj = clone $this;
        $obj['messageVolume'] = $messageVolume;

        return $obj;
    }

    /**
     * Human-readable description of how end users will opt into receiving messages from the given phone numbers.
     */
    public function withOptInWorkflow(string $optInWorkflow): self
    {
        $obj = clone $this;
        $obj['optInWorkflow'] = $optInWorkflow;

        return $obj;
    }

    /**
     * Images showing the opt-in workflow.
     *
     * @param list<URL|array{url: string}> $optInWorkflowImageURLs
     */
    public function withOptInWorkflowImageURLs(
        array $optInWorkflowImageURLs
    ): self {
        $obj = clone $this;
        $obj['optInWorkflowImageURLs'] = $optInWorkflowImageURLs;

        return $obj;
    }

    /**
     * The phone numbers to request the verification of.
     *
     * @param list<TfPhoneNumber|array{phoneNumber: string}> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * An example of a message that will be sent from the given phone numbers.
     */
    public function withProductionMessageContent(
        string $productionMessageContent
    ): self {
        $obj = clone $this;
        $obj['productionMessageContent'] = $productionMessageContent;

        return $obj;
    }

    /**
     * Tollfree usecase categories.
     *
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase
     */
    public function withUseCase(UseCaseCategories|string $useCase): self
    {
        $obj = clone $this;
        $obj['useCase'] = $useCase;

        return $obj;
    }

    /**
     * Human-readable summary of the desired use-case.
     */
    public function withUseCaseSummary(string $useCaseSummary): self
    {
        $obj = clone $this;
        $obj['useCaseSummary'] = $useCaseSummary;

        return $obj;
    }

    /**
     * Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     */
    public function withAgeGatedContent(bool $ageGatedContent): self
    {
        $obj = clone $this;
        $obj['ageGatedContent'] = $ageGatedContent;

        return $obj;
    }

    /**
     * Line 2 of the business address.
     */
    public function withBusinessAddr2(string $businessAddr2): self
    {
        $obj = clone $this;
        $obj['businessAddr2'] = $businessAddr2;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     */
    public function withBusinessRegistrationCountry(
        ?string $businessRegistrationCountry
    ): self {
        $obj = clone $this;
        $obj['businessRegistrationCountry'] = $businessRegistrationCountry;

        return $obj;
    }

    /**
     * Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     */
    public function withBusinessRegistrationNumber(
        ?string $businessRegistrationNumber
    ): self {
        $obj = clone $this;
        $obj['businessRegistrationNumber'] = $businessRegistrationNumber;

        return $obj;
    }

    /**
     * Type of business registration being provided. Required from January 2026.
     */
    public function withBusinessRegistrationType(
        ?string $businessRegistrationType
    ): self {
        $obj = clone $this;
        $obj['businessRegistrationType'] = $businessRegistrationType;

        return $obj;
    }

    /**
     * Doing Business As (DBA) name if different from legal name.
     */
    public function withDoingBusinessAs(?string $doingBusinessAs): self
    {
        $obj = clone $this;
        $obj['doingBusinessAs'] = $doingBusinessAs;

        return $obj;
    }

    /**
     * Business entity classification.
     *
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null $entityType
     */
    public function withEntityType(
        TollFreeVerificationEntityType|string|null $entityType
    ): self {
        $obj = clone $this;
        $obj['entityType'] = $entityType;

        return $obj;
    }

    /**
     * The message returned when users text 'HELP'.
     */
    public function withHelpMessageResponse(?string $helpMessageResponse): self
    {
        $obj = clone $this;
        $obj['helpMessageResponse'] = $helpMessageResponse;

        return $obj;
    }

    /**
     * Message sent to users confirming their opt-in to receive messages.
     */
    public function withOptInConfirmationResponse(
        ?string $optInConfirmationResponse
    ): self {
        $obj = clone $this;
        $obj['optInConfirmationResponse'] = $optInConfirmationResponse;

        return $obj;
    }

    /**
     * Keywords used to collect and process consumer opt-ins.
     */
    public function withOptInKeywords(?string $optInKeywords): self
    {
        $obj = clone $this;
        $obj['optInKeywords'] = $optInKeywords;

        return $obj;
    }

    /**
     * URL pointing to the business's privacy policy. Plain string, no URL format validation.
     */
    public function withPrivacyPolicyURL(?string $privacyPolicyURL): self
    {
        $obj = clone $this;
        $obj['privacyPolicyURL'] = $privacyPolicyURL;

        return $obj;
    }

    /**
     * URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     */
    public function withTermsAndConditionURL(
        ?string $termsAndConditionURL
    ): self {
        $obj = clone $this;
        $obj['termsAndConditionURL'] = $termsAndConditionURL;

        return $obj;
    }

    /**
     * URL that should receive webhooks relating to this verification request.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
