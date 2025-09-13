<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A verification request as it comes out of the database.
 *
 * @phpstan-type verification_request_egress = array{
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
 *   businessAddr2?: string,
 *   verificationStatus?: value-of<TfVerificationStatus>,
 *   webhookURL?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerificationRequestEgress implements BaseModel
{
    /** @use SdkModel<verification_request_egress> */
    use SdkModel;

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

    #[Api('verificationRequestId')]
    public string $verificationRequestID;

    #[Api(optional: true)]
    public ?string $businessAddr2;

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus>|null $verificationStatus
     */
    #[Api(enum: TfVerificationStatus::class, optional: true)]
    public ?string $verificationStatus;

    #[Api('webhookUrl', optional: true)]
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
     * @param list<URL> $optInWorkflowImageURLs
     * @param list<TfPhoneNumber> $phoneNumbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase
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
        ?string $businessAddr2 = null,
        TfVerificationStatus|string|null $verificationStatus = null,
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
        $obj->messageVolume = $messageVolume instanceof Volume ? $messageVolume->value : $messageVolume;
        $obj->optInWorkflow = $optInWorkflow;
        $obj->optInWorkflowImageURLs = $optInWorkflowImageURLs;
        $obj->phoneNumbers = $phoneNumbers;
        $obj->productionMessageContent = $productionMessageContent;
        $obj->useCase = $useCase instanceof UseCaseCategories ? $useCase->value : $useCase;
        $obj->useCaseSummary = $useCaseSummary;
        $obj->verificationRequestID = $verificationRequestID;

        null !== $businessAddr2 && $obj->businessAddr2 = $businessAddr2;
        null !== $verificationStatus && $obj->verificationStatus = $verificationStatus instanceof TfVerificationStatus ? $verificationStatus->value : $verificationStatus;
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
        $obj->messageVolume = $messageVolume instanceof Volume ? $messageVolume->value : $messageVolume;

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
        $obj->useCase = $useCase instanceof UseCaseCategories ? $useCase->value : $useCase;

        return $obj;
    }

    public function withUseCaseSummary(string $useCaseSummary): self
    {
        $obj = clone $this;
        $obj->useCaseSummary = $useCaseSummary;

        return $obj;
    }

    public function withVerificationRequestID(
        string $verificationRequestID
    ): self {
        $obj = clone $this;
        $obj->verificationRequestID = $verificationRequestID;

        return $obj;
    }

    public function withBusinessAddr2(string $businessAddr2): self
    {
        $obj = clone $this;
        $obj->businessAddr2 = $businessAddr2;

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
        $obj->verificationStatus = $verificationStatus instanceof TfVerificationStatus ? $verificationStatus->value : $verificationStatus;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
