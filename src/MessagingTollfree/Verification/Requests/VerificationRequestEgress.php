<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A verification request as it comes out of the database.
 *
 * @phpstan-type VerificationRequestEgressShape = array{
 *   id: string,
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
 *   messageVolume: value-of<Volume>,
 *   optInWorkflow: string,
 *   optInWorkflowImageURLs: list<URL>,
 *   phoneNumbers: list<TfPhoneNumber>,
 *   productionMessageContent: string,
 *   useCase: value-of<UseCaseCategories>,
 *   useCaseSummary: string,
 *   verificationRequestID: string,
 *   ageGatedContent?: bool|null,
 *   businessAddr2?: string|null,
 *   businessRegistrationCountry?: string|null,
 *   businessRegistrationNumber?: string|null,
 *   businessRegistrationType?: string|null,
 *   doingBusinessAs?: string|null,
 *   entityType?: value-of<TollFreeVerificationEntityType>|null,
 *   helpMessageResponse?: string|null,
 *   optInConfirmationResponse?: string|null,
 *   optInKeywords?: string|null,
 *   privacyPolicyURL?: string|null,
 *   termsAndConditionURL?: string|null,
 *   verificationStatus?: value-of<TfVerificationStatus>|null,
 *   webhookURL?: string|null,
 * }
 */
final class VerificationRequestEgress implements BaseModel
{
    /** @use SdkModel<VerificationRequestEgressShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $additionalInformation;

    #[Required]
    public string $businessAddr1;

    #[Required]
    public string $businessCity;

    #[Required]
    public string $businessContactEmail;

    #[Required]
    public string $businessContactFirstName;

    #[Required]
    public string $businessContactLastName;

    #[Required]
    public string $businessContactPhone;

    #[Required]
    public string $businessName;

    #[Required]
    public string $businessState;

    #[Required]
    public string $businessZip;

    #[Required]
    public string $corporateWebsite;

    #[Required]
    public string $isvReseller;

    /**
     * Message Volume Enums.
     *
     * @var value-of<Volume> $messageVolume
     */
    #[Required(enum: Volume::class)]
    public string $messageVolume;

    #[Required]
    public string $optInWorkflow;

    /** @var list<URL> $optInWorkflowImageURLs */
    #[Required(list: URL::class)]
    public array $optInWorkflowImageURLs;

    /** @var list<TfPhoneNumber> $phoneNumbers */
    #[Required(list: TfPhoneNumber::class)]
    public array $phoneNumbers;

    #[Required]
    public string $productionMessageContent;

    /**
     * Tollfree usecase categories.
     *
     * @var value-of<UseCaseCategories> $useCase
     */
    #[Required(enum: UseCaseCategories::class)]
    public string $useCase;

    #[Required]
    public string $useCaseSummary;

    #[Required('verificationRequestId')]
    public string $verificationRequestID;

    #[Optional]
    public ?bool $ageGatedContent;

    #[Optional]
    public ?string $businessAddr2;

    #[Optional]
    public ?string $businessRegistrationCountry;

    #[Optional]
    public ?string $businessRegistrationNumber;

    #[Optional]
    public ?string $businessRegistrationType;

    #[Optional]
    public ?string $doingBusinessAs;

    /**
     * Business entity classification.
     *
     * @var value-of<TollFreeVerificationEntityType>|null $entityType
     */
    #[Optional(enum: TollFreeVerificationEntityType::class)]
    public ?string $entityType;

    #[Optional]
    public ?string $helpMessageResponse;

    #[Optional]
    public ?string $optInConfirmationResponse;

    #[Optional]
    public ?string $optInKeywords;

    #[Optional]
    public ?string $privacyPolicyURL;

    #[Optional]
    public ?string $termsAndConditionURL;

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus>|null $verificationStatus
     */
    #[Optional(enum: TfVerificationStatus::class)]
    public ?string $verificationStatus;

    #[Optional('webhookUrl')]
    public ?string $webhookURL;

    /**
     * `new VerificationRequestEgress()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationRequestEgress::with(
     *   id: ...,
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
     *   verificationRequestID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationRequestEgress)
     *   ->withID(...)
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
     *   ->withVerificationRequestID(...)
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
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType> $entityType
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $verificationStatus
     */
    public static function with(
        string $id,
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
        string $verificationRequestID,
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
        TfVerificationStatus|string|null $verificationStatus = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
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
        $obj['verificationRequestID'] = $verificationRequestID;

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
        null !== $verificationStatus && $obj['verificationStatus'] = $verificationStatus;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAdditionalInformation(
        string $additionalInformation
    ): self {
        $obj = clone $this;
        $obj['additionalInformation'] = $additionalInformation;

        return $obj;
    }

    public function withBusinessAddr1(string $businessAddr1): self
    {
        $obj = clone $this;
        $obj['businessAddr1'] = $businessAddr1;

        return $obj;
    }

    public function withBusinessCity(string $businessCity): self
    {
        $obj = clone $this;
        $obj['businessCity'] = $businessCity;

        return $obj;
    }

    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $obj = clone $this;
        $obj['businessContactEmail'] = $businessContactEmail;

        return $obj;
    }

    public function withBusinessContactFirstName(
        string $businessContactFirstName
    ): self {
        $obj = clone $this;
        $obj['businessContactFirstName'] = $businessContactFirstName;

        return $obj;
    }

    public function withBusinessContactLastName(
        string $businessContactLastName
    ): self {
        $obj = clone $this;
        $obj['businessContactLastName'] = $businessContactLastName;

        return $obj;
    }

    public function withBusinessContactPhone(string $businessContactPhone): self
    {
        $obj = clone $this;
        $obj['businessContactPhone'] = $businessContactPhone;

        return $obj;
    }

    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj['businessName'] = $businessName;

        return $obj;
    }

    public function withBusinessState(string $businessState): self
    {
        $obj = clone $this;
        $obj['businessState'] = $businessState;

        return $obj;
    }

    public function withBusinessZip(string $businessZip): self
    {
        $obj = clone $this;
        $obj['businessZip'] = $businessZip;

        return $obj;
    }

    public function withCorporateWebsite(string $corporateWebsite): self
    {
        $obj = clone $this;
        $obj['corporateWebsite'] = $corporateWebsite;

        return $obj;
    }

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

    public function withOptInWorkflow(string $optInWorkflow): self
    {
        $obj = clone $this;
        $obj['optInWorkflow'] = $optInWorkflow;

        return $obj;
    }

    /**
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
     * @param list<TfPhoneNumber|array{phoneNumber: string}> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

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

    public function withUseCaseSummary(string $useCaseSummary): self
    {
        $obj = clone $this;
        $obj['useCaseSummary'] = $useCaseSummary;

        return $obj;
    }

    public function withVerificationRequestID(
        string $verificationRequestID
    ): self {
        $obj = clone $this;
        $obj['verificationRequestID'] = $verificationRequestID;

        return $obj;
    }

    public function withAgeGatedContent(bool $ageGatedContent): self
    {
        $obj = clone $this;
        $obj['ageGatedContent'] = $ageGatedContent;

        return $obj;
    }

    public function withBusinessAddr2(string $businessAddr2): self
    {
        $obj = clone $this;
        $obj['businessAddr2'] = $businessAddr2;

        return $obj;
    }

    public function withBusinessRegistrationCountry(
        string $businessRegistrationCountry
    ): self {
        $obj = clone $this;
        $obj['businessRegistrationCountry'] = $businessRegistrationCountry;

        return $obj;
    }

    public function withBusinessRegistrationNumber(
        string $businessRegistrationNumber
    ): self {
        $obj = clone $this;
        $obj['businessRegistrationNumber'] = $businessRegistrationNumber;

        return $obj;
    }

    public function withBusinessRegistrationType(
        string $businessRegistrationType
    ): self {
        $obj = clone $this;
        $obj['businessRegistrationType'] = $businessRegistrationType;

        return $obj;
    }

    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $obj = clone $this;
        $obj['doingBusinessAs'] = $doingBusinessAs;

        return $obj;
    }

    /**
     * Business entity classification.
     *
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType> $entityType
     */
    public function withEntityType(
        TollFreeVerificationEntityType|string $entityType
    ): self {
        $obj = clone $this;
        $obj['entityType'] = $entityType;

        return $obj;
    }

    public function withHelpMessageResponse(string $helpMessageResponse): self
    {
        $obj = clone $this;
        $obj['helpMessageResponse'] = $helpMessageResponse;

        return $obj;
    }

    public function withOptInConfirmationResponse(
        string $optInConfirmationResponse
    ): self {
        $obj = clone $this;
        $obj['optInConfirmationResponse'] = $optInConfirmationResponse;

        return $obj;
    }

    public function withOptInKeywords(string $optInKeywords): self
    {
        $obj = clone $this;
        $obj['optInKeywords'] = $optInKeywords;

        return $obj;
    }

    public function withPrivacyPolicyURL(string $privacyPolicyURL): self
    {
        $obj = clone $this;
        $obj['privacyPolicyURL'] = $privacyPolicyURL;

        return $obj;
    }

    public function withTermsAndConditionURL(string $termsAndConditionURL): self
    {
        $obj = clone $this;
        $obj['termsAndConditionURL'] = $termsAndConditionURL;

        return $obj;
    }

    /**
     * Tollfree verification status.
     *
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $verificationStatus
     */
    public function withVerificationStatus(
        TfVerificationStatus|string $verificationStatus
    ): self {
        $obj = clone $this;
        $obj['verificationStatus'] = $verificationStatus;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
