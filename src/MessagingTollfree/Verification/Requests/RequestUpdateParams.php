<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RequestUpdateParams); // set properties as needed
 * $client->messagingTollfree.verification.requests->update(...$params->toArray());
 * ```
 * Update an existing tollfree verification request. This is particularly useful when there are pending customer actions to be taken.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingTollfree.verification.requests->update(...$params->toArray());`
 *
 * @see Telnyx\MessagingTollfree\Verification\Requests->update
 *
 * @phpstan-type request_update_params = array{
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
 *   optInWorkflowImageURLs: list<URL>,
 *   phoneNumbers: list<TfPhoneNumber>,
 *   productionMessageContent: string,
 *   useCase: UseCaseCategories|value-of<UseCaseCategories>,
 *   useCaseSummary: string,
 *   businessAddr2?: string,
 *   webhookURL?: string,
 * }
 */
final class RequestUpdateParams implements BaseModel
{
    /** @use SdkModel<request_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Any additional information.
     */
    #[Api]
    public string $additionalInformation;

    /**
     * Line 1 of the business address.
     */
    #[Api]
    public string $businessAddr1;

    /**
     * The city of the business address; the first letter should be capitalized.
     */
    #[Api]
    public string $businessCity;

    /**
     * The email address of the business contact.
     */
    #[Api]
    public string $businessContactEmail;

    /**
     * First name of the business contact; there are no specific requirements on formatting.
     */
    #[Api]
    public string $businessContactFirstName;

    /**
     * Last name of the business contact; there are no specific requirements on formatting.
     */
    #[Api]
    public string $businessContactLastName;

    /**
     * The phone number of the business contact in E.164 format.
     */
    #[Api]
    public string $businessContactPhone;

    /**
     * Name of the business; there are no specific formatting requirements.
     */
    #[Api]
    public string $businessName;

    /**
     * The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized.
     */
    #[Api]
    public string $businessState;

    /**
     * The ZIP code of the business address.
     */
    #[Api]
    public string $businessZip;

    /**
     * A URL, including the scheme, pointing to the corporate website.
     */
    #[Api]
    public string $corporateWebsite;

    /**
     * ISV name.
     */
    #[Api]
    public string $isvReseller;

    /**
     * Message Volume Enums.
     *
     * @var value-of<Volume> $messageVolume
     */
    #[Api(enum: Volume::class)]
    public string $messageVolume;

    /**
     * Human-readable description of how end users will opt into receiving messages from the given phone numbers.
     */
    #[Api]
    public string $optInWorkflow;

    /**
     * Images showing the opt-in workflow.
     *
     * @var list<URL> $optInWorkflowImageURLs
     */
    #[Api(list: URL::class)]
    public array $optInWorkflowImageURLs;

    /**
     * The phone numbers to request the verification of.
     *
     * @var list<TfPhoneNumber> $phoneNumbers
     */
    #[Api(list: TfPhoneNumber::class)]
    public array $phoneNumbers;

    /**
     * An example of a message that will be sent from the given phone numbers.
     */
    #[Api]
    public string $productionMessageContent;

    /**
     * Tollfree usecase categories.
     *
     * @var value-of<UseCaseCategories> $useCase
     */
    #[Api(enum: UseCaseCategories::class)]
    public string $useCase;

    /**
     * Human-readable summary of the desired use-case.
     */
    #[Api]
    public string $useCaseSummary;

    /**
     * Line 2 of the business address.
     */
    #[Api(optional: true)]
    public ?string $businessAddr2;

    /**
     * URL that should receive webhooks relating to this verification request.
     */
    #[Api('webhookUrl', optional: true)]
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
     * @param list<URL> $optInWorkflowImageURLs
     * @param list<TfPhoneNumber> $phoneNumbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase
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
        ?string $businessAddr2 = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

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

        null !== $businessAddr2 && $obj->businessAddr2 = $businessAddr2;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Any additional information.
     */
    public function withAdditionalInformation(
        string $additionalInformation
    ): self {
        $obj = clone $this;
        $obj->additionalInformation = $additionalInformation;

        return $obj;
    }

    /**
     * Line 1 of the business address.
     */
    public function withBusinessAddr1(string $businessAddr1): self
    {
        $obj = clone $this;
        $obj->businessAddr1 = $businessAddr1;

        return $obj;
    }

    /**
     * The city of the business address; the first letter should be capitalized.
     */
    public function withBusinessCity(string $businessCity): self
    {
        $obj = clone $this;
        $obj->businessCity = $businessCity;

        return $obj;
    }

    /**
     * The email address of the business contact.
     */
    public function withBusinessContactEmail(string $businessContactEmail): self
    {
        $obj = clone $this;
        $obj->businessContactEmail = $businessContactEmail;

        return $obj;
    }

    /**
     * First name of the business contact; there are no specific requirements on formatting.
     */
    public function withBusinessContactFirstName(
        string $businessContactFirstName
    ): self {
        $obj = clone $this;
        $obj->businessContactFirstName = $businessContactFirstName;

        return $obj;
    }

    /**
     * Last name of the business contact; there are no specific requirements on formatting.
     */
    public function withBusinessContactLastName(
        string $businessContactLastName
    ): self {
        $obj = clone $this;
        $obj->businessContactLastName = $businessContactLastName;

        return $obj;
    }

    /**
     * The phone number of the business contact in E.164 format.
     */
    public function withBusinessContactPhone(string $businessContactPhone): self
    {
        $obj = clone $this;
        $obj->businessContactPhone = $businessContactPhone;

        return $obj;
    }

    /**
     * Name of the business; there are no specific formatting requirements.
     */
    public function withBusinessName(string $businessName): self
    {
        $obj = clone $this;
        $obj->businessName = $businessName;

        return $obj;
    }

    /**
     * The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized.
     */
    public function withBusinessState(string $businessState): self
    {
        $obj = clone $this;
        $obj->businessState = $businessState;

        return $obj;
    }

    /**
     * The ZIP code of the business address.
     */
    public function withBusinessZip(string $businessZip): self
    {
        $obj = clone $this;
        $obj->businessZip = $businessZip;

        return $obj;
    }

    /**
     * A URL, including the scheme, pointing to the corporate website.
     */
    public function withCorporateWebsite(string $corporateWebsite): self
    {
        $obj = clone $this;
        $obj->corporateWebsite = $corporateWebsite;

        return $obj;
    }

    /**
     * ISV name.
     */
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

    /**
     * Human-readable description of how end users will opt into receiving messages from the given phone numbers.
     */
    public function withOptInWorkflow(string $optInWorkflow): self
    {
        $obj = clone $this;
        $obj->optInWorkflow = $optInWorkflow;

        return $obj;
    }

    /**
     * Images showing the opt-in workflow.
     *
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
     * The phone numbers to request the verification of.
     *
     * @param list<TfPhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * An example of a message that will be sent from the given phone numbers.
     */
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

    /**
     * Human-readable summary of the desired use-case.
     */
    public function withUseCaseSummary(string $useCaseSummary): self
    {
        $obj = clone $this;
        $obj->useCaseSummary = $useCaseSummary;

        return $obj;
    }

    /**
     * Line 2 of the business address.
     */
    public function withBusinessAddr2(string $businessAddr2): self
    {
        $obj = clone $this;
        $obj->businessAddr2 = $businessAddr2;

        return $obj;
    }

    /**
     * URL that should receive webhooks relating to this verification request.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
