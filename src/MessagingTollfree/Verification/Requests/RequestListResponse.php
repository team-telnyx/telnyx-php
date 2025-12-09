<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A paginated response.
 *
 * @phpstan-type RequestListResponseShape = array{
 *   records: list<VerificationRequestStatus>, totalRecords: int
 * }
 */
final class RequestListResponse implements BaseModel
{
    /** @use SdkModel<RequestListResponseShape> */
    use SdkModel;

    /**
     * The records yielded by this request.
     *
     * @var list<VerificationRequestStatus> $records
     */
    #[Required(list: VerificationRequestStatus::class)]
    public array $records;

    /**
     * The total amount of records for these query parameters.
     */
    #[Required('total_records')]
    public int $totalRecords;

    /**
     * `new RequestListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestListResponse::with(records: ..., totalRecords: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequestListResponse)->withRecords(...)->withTotalRecords(...)
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
     * @param list<VerificationRequestStatus|array{
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
     *   ageGatedContent?: bool|null,
     *   businessAddr2?: string|null,
     *   businessRegistrationCountry?: string|null,
     *   businessRegistrationNumber?: string|null,
     *   businessRegistrationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   doingBusinessAs?: string|null,
     *   entityType?: value-of<TollFreeVerificationEntityType>|null,
     *   helpMessageResponse?: string|null,
     *   optInConfirmationResponse?: string|null,
     *   optInKeywords?: string|null,
     *   privacyPolicyURL?: string|null,
     *   reason?: string|null,
     *   termsAndConditionURL?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookURL?: string|null,
     * }> $records
     */
    public static function with(
        array $records = [],
        int $totalRecords = 0
    ): self {
        $obj = new self;

        $obj['records'] = $records;
        $obj['totalRecords'] = $totalRecords;

        return $obj;
    }

    /**
     * The records yielded by this request.
     *
     * @param list<VerificationRequestStatus|array{
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
     *   ageGatedContent?: bool|null,
     *   businessAddr2?: string|null,
     *   businessRegistrationCountry?: string|null,
     *   businessRegistrationNumber?: string|null,
     *   businessRegistrationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   doingBusinessAs?: string|null,
     *   entityType?: value-of<TollFreeVerificationEntityType>|null,
     *   helpMessageResponse?: string|null,
     *   optInConfirmationResponse?: string|null,
     *   optInKeywords?: string|null,
     *   privacyPolicyURL?: string|null,
     *   reason?: string|null,
     *   termsAndConditionURL?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   webhookURL?: string|null,
     * }> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj['records'] = $records;

        return $obj;
    }

    /**
     * The total amount of records for these query parameters.
     */
    public function withTotalRecords(int $totalRecords): self
    {
        $obj = clone $this;
        $obj['totalRecords'] = $totalRecords;

        return $obj;
    }
}
