<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A verification request and its status, suitable for returning to users.
 *
 * @phpstan-import-type URLShape from \Telnyx\MessagingTollfree\Verification\Requests\URL
 * @phpstan-import-type TfPhoneNumberShape from \Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber
 *
 * @phpstan-type VerificationRequestStatusShape = array{
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
 *   messageVolume: Volume|value-of<Volume>,
 *   optInWorkflow: string,
 *   optInWorkflowImageURLs: list<URLShape>,
 *   phoneNumbers: list<TfPhoneNumberShape>,
 *   productionMessageContent: string,
 *   useCase: UseCaseCategories|value-of<UseCaseCategories>,
 *   useCaseSummary: string,
 *   verificationStatus: TfVerificationStatus|value-of<TfVerificationStatus>,
 *   ageGatedContent?: bool|null,
 *   businessAddr2?: string|null,
 *   businessRegistrationCountry?: string|null,
 *   businessRegistrationNumber?: string|null,
 *   businessRegistrationType?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   doingBusinessAs?: string|null,
 *   entityType?: null|TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>,
 *   helpMessageResponse?: string|null,
 *   optInConfirmationResponse?: string|null,
 *   optInKeywords?: string|null,
 *   privacyPolicyURL?: string|null,
 *   reason?: string|null,
 *   termsAndConditionURL?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookURL?: string|null,
 * }
 */
final class VerificationRequestStatus implements BaseModel
{
    /** @use SdkModel<VerificationRequestStatusShape> */
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

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus> $verificationStatus
     */
    #[Required(enum: TfVerificationStatus::class)]
    public string $verificationStatus;

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
    public ?\DateTimeInterface $createdAt;

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
    public ?string $reason;

    #[Optional]
    public ?string $termsAndConditionURL;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('webhookUrl')]
    public ?string $webhookURL;

    /**
     * `new VerificationRequestStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationRequestStatus::with(
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
     *   verificationStatus: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationRequestStatus)
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
     *   ->withVerificationStatus(...)
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
     * @param list<URLShape> $optInWorkflowImageURLs
     * @param list<TfPhoneNumberShape> $phoneNumbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $verificationStatus
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType> $entityType
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
        TfVerificationStatus|string $verificationStatus,
        ?bool $ageGatedContent = null,
        ?string $businessAddr2 = null,
        ?string $businessRegistrationCountry = null,
        ?string $businessRegistrationNumber = null,
        ?string $businessRegistrationType = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $doingBusinessAs = null,
        TollFreeVerificationEntityType|string|null $entityType = null,
        ?string $helpMessageResponse = null,
        ?string $optInConfirmationResponse = null,
        ?string $optInKeywords = null,
        ?string $privacyPolicyURL = null,
        ?string $reason = null,
        ?string $termsAndConditionURL = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
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
        $self['verificationStatus'] = $verificationStatus;

        null !== $ageGatedContent && $self['ageGatedContent'] = $ageGatedContent;
        null !== $businessAddr2 && $self['businessAddr2'] = $businessAddr2;
        null !== $businessRegistrationCountry && $self['businessRegistrationCountry'] = $businessRegistrationCountry;
        null !== $businessRegistrationNumber && $self['businessRegistrationNumber'] = $businessRegistrationNumber;
        null !== $businessRegistrationType && $self['businessRegistrationType'] = $businessRegistrationType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $doingBusinessAs && $self['doingBusinessAs'] = $doingBusinessAs;
        null !== $entityType && $self['entityType'] = $entityType;
        null !== $helpMessageResponse && $self['helpMessageResponse'] = $helpMessageResponse;
        null !== $optInConfirmationResponse && $self['optInConfirmationResponse'] = $optInConfirmationResponse;
        null !== $optInKeywords && $self['optInKeywords'] = $optInKeywords;
        null !== $privacyPolicyURL && $self['privacyPolicyURL'] = $privacyPolicyURL;
        null !== $reason && $self['reason'] = $reason;
        null !== $termsAndConditionURL && $self['termsAndConditionURL'] = $termsAndConditionURL;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAdditionalInformation(
        string $additionalInformation
    ): self {
        $self = clone $this;
        $self['additionalInformation'] = $additionalInformation;

        return $self;
    }

    public function withBusinessAddr1(string $businessAddr1): self
    {
        $self = clone $this;
        $self['businessAddr1'] = $businessAddr1;

        return $self;
    }

    public function withBusinessCity(string $businessCity): self
    {
        $self = clone $this;
        $self['businessCity'] = $businessCity;

        return $self;
    }

    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $self = clone $this;
        $self['businessContactEmail'] = $businessContactEmail;

        return $self;
    }

    public function withBusinessContactFirstName(
        string $businessContactFirstName
    ): self {
        $self = clone $this;
        $self['businessContactFirstName'] = $businessContactFirstName;

        return $self;
    }

    public function withBusinessContactLastName(
        string $businessContactLastName
    ): self {
        $self = clone $this;
        $self['businessContactLastName'] = $businessContactLastName;

        return $self;
    }

    public function withBusinessContactPhone(string $businessContactPhone): self
    {
        $self = clone $this;
        $self['businessContactPhone'] = $businessContactPhone;

        return $self;
    }

    public function withBusinessName(string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    public function withBusinessState(string $businessState): self
    {
        $self = clone $this;
        $self['businessState'] = $businessState;

        return $self;
    }

    public function withBusinessZip(string $businessZip): self
    {
        $self = clone $this;
        $self['businessZip'] = $businessZip;

        return $self;
    }

    public function withCorporateWebsite(string $corporateWebsite): self
    {
        $self = clone $this;
        $self['corporateWebsite'] = $corporateWebsite;

        return $self;
    }

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

    public function withOptInWorkflow(string $optInWorkflow): self
    {
        $self = clone $this;
        $self['optInWorkflow'] = $optInWorkflow;

        return $self;
    }

    /**
     * @param list<URLShape> $optInWorkflowImageURLs
     */
    public function withOptInWorkflowImageURLs(
        array $optInWorkflowImageURLs
    ): self {
        $self = clone $this;
        $self['optInWorkflowImageURLs'] = $optInWorkflowImageURLs;

        return $self;
    }

    /**
     * @param list<TfPhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

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

    public function withUseCaseSummary(string $useCaseSummary): self
    {
        $self = clone $this;
        $self['useCaseSummary'] = $useCaseSummary;

        return $self;
    }

    /**
     * Tollfree verification status.
     *
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $verificationStatus
     */
    public function withVerificationStatus(
        TfVerificationStatus|string $verificationStatus
    ): self {
        $self = clone $this;
        $self['verificationStatus'] = $verificationStatus;

        return $self;
    }

    public function withAgeGatedContent(bool $ageGatedContent): self
    {
        $self = clone $this;
        $self['ageGatedContent'] = $ageGatedContent;

        return $self;
    }

    public function withBusinessAddr2(string $businessAddr2): self
    {
        $self = clone $this;
        $self['businessAddr2'] = $businessAddr2;

        return $self;
    }

    public function withBusinessRegistrationCountry(
        string $businessRegistrationCountry
    ): self {
        $self = clone $this;
        $self['businessRegistrationCountry'] = $businessRegistrationCountry;

        return $self;
    }

    public function withBusinessRegistrationNumber(
        string $businessRegistrationNumber
    ): self {
        $self = clone $this;
        $self['businessRegistrationNumber'] = $businessRegistrationNumber;

        return $self;
    }

    public function withBusinessRegistrationType(
        string $businessRegistrationType
    ): self {
        $self = clone $this;
        $self['businessRegistrationType'] = $businessRegistrationType;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $self = clone $this;
        $self['doingBusinessAs'] = $doingBusinessAs;

        return $self;
    }

    /**
     * Business entity classification.
     *
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType> $entityType
     */
    public function withEntityType(
        TollFreeVerificationEntityType|string $entityType
    ): self {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    public function withHelpMessageResponse(string $helpMessageResponse): self
    {
        $self = clone $this;
        $self['helpMessageResponse'] = $helpMessageResponse;

        return $self;
    }

    public function withOptInConfirmationResponse(
        string $optInConfirmationResponse
    ): self {
        $self = clone $this;
        $self['optInConfirmationResponse'] = $optInConfirmationResponse;

        return $self;
    }

    public function withOptInKeywords(string $optInKeywords): self
    {
        $self = clone $this;
        $self['optInKeywords'] = $optInKeywords;

        return $self;
    }

    public function withPrivacyPolicyURL(string $privacyPolicyURL): self
    {
        $self = clone $this;
        $self['privacyPolicyURL'] = $privacyPolicyURL;

        return $self;
    }

    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    public function withTermsAndConditionURL(string $termsAndConditionURL): self
    {
        $self = clone $this;
        $self['termsAndConditionURL'] = $termsAndConditionURL;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
