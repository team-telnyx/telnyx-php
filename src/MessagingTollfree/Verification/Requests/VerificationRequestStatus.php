<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * A verification request and its status, suitable for returning to users.
 *
 * @phpstan-type verification_request_status = array{
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
 *   verificationStatus: value-of<TfVerificationStatus>,
 *   ageGatedContent?: bool,
 *   businessAddr2?: string,
 *   businessRegistrationCountry?: string,
 *   businessRegistrationNumber?: string,
 *   businessRegistrationType?: string,
 *   createdAt?: \DateTimeInterface,
 *   doingBusinessAs?: string,
 *   entityType?: value-of<TollFreeVerificationEntityType>,
 *   helpMessageResponse?: string,
 *   optInConfirmationResponse?: string,
 *   optInKeywords?: string,
 *   privacyPolicyURL?: string,
 *   reason?: string,
 *   termsAndConditionURL?: string,
 *   updatedAt?: \DateTimeInterface,
 *   webhookURL?: string,
 * }
 */
final class VerificationRequestStatus implements BaseModel, ResponseConverter
{
    /** @use SdkModel<verification_request_status> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public string $additionalInformation;

    #[Api]
    public string $businessAddr1;

    #[Api]
    public string $businessCity;

    #[Api]
    public string $businessContactEmail;

    #[Api]
    public string $businessContactFirstName;

    #[Api]
    public string $businessContactLastName;

    #[Api]
    public string $businessContactPhone;

    #[Api]
    public string $businessName;

    #[Api]
    public string $businessState;

    #[Api]
    public string $businessZip;

    #[Api]
    public string $corporateWebsite;

    #[Api]
    public string $isvReseller;

    /**
     * Message Volume Enums.
     *
     * @var value-of<Volume> $messageVolume
     */
    #[Api(enum: Volume::class)]
    public string $messageVolume;

    #[Api]
    public string $optInWorkflow;

    /** @var list<URL> $optInWorkflowImageURLs */
    #[Api(list: URL::class)]
    public array $optInWorkflowImageURLs;

    /** @var list<TfPhoneNumber> $phoneNumbers */
    #[Api(list: TfPhoneNumber::class)]
    public array $phoneNumbers;

    #[Api]
    public string $productionMessageContent;

    /**
     * Tollfree usecase categories.
     *
     * @var value-of<UseCaseCategories> $useCase
     */
    #[Api(enum: UseCaseCategories::class)]
    public string $useCase;

    #[Api]
    public string $useCaseSummary;

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus> $verificationStatus
     */
    #[Api(enum: TfVerificationStatus::class)]
    public string $verificationStatus;

    #[Api(optional: true)]
    public ?bool $ageGatedContent;

    #[Api(optional: true)]
    public ?string $businessAddr2;

    #[Api(optional: true)]
    public ?string $businessRegistrationCountry;

    #[Api(optional: true)]
    public ?string $businessRegistrationNumber;

    #[Api(optional: true)]
    public ?string $businessRegistrationType;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $doingBusinessAs;

    /**
     * Business entity classification.
     *
     * @var value-of<TollFreeVerificationEntityType>|null $entityType
     */
    #[Api(enum: TollFreeVerificationEntityType::class, optional: true)]
    public ?string $entityType;

    #[Api(optional: true)]
    public ?string $helpMessageResponse;

    #[Api(optional: true)]
    public ?string $optInConfirmationResponse;

    #[Api(optional: true)]
    public ?string $optInKeywords;

    #[Api(optional: true)]
    public ?string $privacyPolicyURL;

    #[Api(optional: true)]
    public ?string $reason;

    #[Api(optional: true)]
    public ?string $termsAndConditionURL;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('webhookUrl', optional: true)]
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
     * @param list<URL> $optInWorkflowImageURLs
     * @param list<TfPhoneNumber> $phoneNumbers
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
        $obj = new self;

        $obj->id = $id;
        $obj->additionalInformation = $additionalInformation;
        $obj->businessAddr1 = $businessAddr1;
        $obj->businessCity = $businessCity;
        $obj->businessContactEmail = $businessContactEmail;
        $obj->businessContactFirstName = $businessContactFirstName;
        $obj->businessContactLastName = $businessContactLastName;
        $obj->businessContactPhone = $businessContactPhone;
        $obj->businessName = $businessName;
        $obj->businessState = $businessState;
        $obj->businessZip = $businessZip;
        $obj->corporateWebsite = $corporateWebsite;
        $obj->isvReseller = $isvReseller;
        $obj['messageVolume'] = $messageVolume;
        $obj->optInWorkflow = $optInWorkflow;
        $obj->optInWorkflowImageURLs = $optInWorkflowImageURLs;
        $obj->phoneNumbers = $phoneNumbers;
        $obj->productionMessageContent = $productionMessageContent;
        $obj['useCase'] = $useCase;
        $obj->useCaseSummary = $useCaseSummary;
        $obj['verificationStatus'] = $verificationStatus;

        null !== $ageGatedContent && $obj->ageGatedContent = $ageGatedContent;
        null !== $businessAddr2 && $obj->businessAddr2 = $businessAddr2;
        null !== $businessRegistrationCountry && $obj->businessRegistrationCountry = $businessRegistrationCountry;
        null !== $businessRegistrationNumber && $obj->businessRegistrationNumber = $businessRegistrationNumber;
        null !== $businessRegistrationType && $obj->businessRegistrationType = $businessRegistrationType;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $doingBusinessAs && $obj->doingBusinessAs = $doingBusinessAs;
        null !== $entityType && $obj['entityType'] = $entityType;
        null !== $helpMessageResponse && $obj->helpMessageResponse = $helpMessageResponse;
        null !== $optInConfirmationResponse && $obj->optInConfirmationResponse = $optInConfirmationResponse;
        null !== $optInKeywords && $obj->optInKeywords = $optInKeywords;
        null !== $privacyPolicyURL && $obj->privacyPolicyURL = $privacyPolicyURL;
        null !== $reason && $obj->reason = $reason;
        null !== $termsAndConditionURL && $obj->termsAndConditionURL = $termsAndConditionURL;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAdditionalInformation(
        string $additionalInformation
    ): self {
        $obj = clone $this;
        $obj->additionalInformation = $additionalInformation;

        return $obj;
    }

    public function withBusinessAddr1(string $businessAddr1): self
    {
        $obj = clone $this;
        $obj->businessAddr1 = $businessAddr1;

        return $obj;
    }

    public function withBusinessCity(string $businessCity): self
    {
        $obj = clone $this;
        $obj->businessCity = $businessCity;

        return $obj;
    }

    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $obj = clone $this;
        $obj->businessContactEmail = $businessContactEmail;

        return $obj;
    }

    public function withBusinessContactFirstName(
        string $businessContactFirstName
    ): self {
        $obj = clone $this;
        $obj->businessContactFirstName = $businessContactFirstName;

        return $obj;
    }

    public function withBusinessContactLastName(
        string $businessContactLastName
    ): self {
        $obj = clone $this;
        $obj->businessContactLastName = $businessContactLastName;

        return $obj;
    }

    public function withBusinessContactPhone(string $businessContactPhone): self
    {
        $obj = clone $this;
        $obj->businessContactPhone = $businessContactPhone;

        return $obj;
    }

    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj->businessName = $businessName;

        return $obj;
    }

    public function withBusinessState(string $businessState): self
    {
        $obj = clone $this;
        $obj->businessState = $businessState;

        return $obj;
    }

    public function withBusinessZip(string $businessZip): self
    {
        $obj = clone $this;
        $obj->businessZip = $businessZip;

        return $obj;
    }

    public function withCorporateWebsite(string $corporateWebsite): self
    {
        $obj = clone $this;
        $obj->corporateWebsite = $corporateWebsite;

        return $obj;
    }

    public function withIsvReseller(string $isvReseller): self
    {
        $obj = clone $this;
        $obj->isvReseller = $isvReseller;

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
        $obj->optInWorkflow = $optInWorkflow;

        return $obj;
    }

    /**
     * @param list<URL> $optInWorkflowImageURLs
     */
    public function withOptInWorkflowImageURLs(
        array $optInWorkflowImageURLs
    ): self {
        $obj = clone $this;
        $obj->optInWorkflowImageURLs = $optInWorkflowImageURLs;

        return $obj;
    }

    /**
     * @param list<TfPhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    public function withProductionMessageContent(
        string $productionMessageContent
    ): self {
        $obj = clone $this;
        $obj->productionMessageContent = $productionMessageContent;

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
        $obj->useCaseSummary = $useCaseSummary;

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

    public function withAgeGatedContent(bool $ageGatedContent): self
    {
        $obj = clone $this;
        $obj->ageGatedContent = $ageGatedContent;

        return $obj;
    }

    public function withBusinessAddr2(string $businessAddr2): self
    {
        $obj = clone $this;
        $obj->businessAddr2 = $businessAddr2;

        return $obj;
    }

    public function withBusinessRegistrationCountry(
        string $businessRegistrationCountry
    ): self {
        $obj = clone $this;
        $obj->businessRegistrationCountry = $businessRegistrationCountry;

        return $obj;
    }

    public function withBusinessRegistrationNumber(
        string $businessRegistrationNumber
    ): self {
        $obj = clone $this;
        $obj->businessRegistrationNumber = $businessRegistrationNumber;

        return $obj;
    }

    public function withBusinessRegistrationType(
        string $businessRegistrationType
    ): self {
        $obj = clone $this;
        $obj->businessRegistrationType = $businessRegistrationType;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDoingBusinessAs(string $doingBusinessAs): self
    {
        $obj = clone $this;
        $obj->doingBusinessAs = $doingBusinessAs;

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
        $obj->helpMessageResponse = $helpMessageResponse;

        return $obj;
    }

    public function withOptInConfirmationResponse(
        string $optInConfirmationResponse
    ): self {
        $obj = clone $this;
        $obj->optInConfirmationResponse = $optInConfirmationResponse;

        return $obj;
    }

    public function withOptInKeywords(string $optInKeywords): self
    {
        $obj = clone $this;
        $obj->optInKeywords = $optInKeywords;

        return $obj;
    }

    public function withPrivacyPolicyURL(string $privacyPolicyURL): self
    {
        $obj = clone $this;
        $obj->privacyPolicyURL = $privacyPolicyURL;

        return $obj;
    }

    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    public function withTermsAndConditionURL(string $termsAndConditionURL): self
    {
        $obj = clone $this;
        $obj->termsAndConditionURL = $termsAndConditionURL;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
