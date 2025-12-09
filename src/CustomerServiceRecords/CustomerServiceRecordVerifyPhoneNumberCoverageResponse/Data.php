<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data\AdditionalDataRequired;

/**
 * @phpstan-type DataShape = array{
 *   additionalDataRequired?: list<value-of<AdditionalDataRequired>>|null,
 *   hasCsrCoverage?: bool|null,
 *   phoneNumber?: string|null,
 *   reason?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Additional data required to perform CSR for the phone number. Only returned if `has_csr_coverage` is true.
     *
     * @var list<value-of<AdditionalDataRequired>>|null $additionalDataRequired
     */
    #[Optional('additional_data_required', list: AdditionalDataRequired::class)]
    public ?array $additionalDataRequired;

    /**
     * Indicates whether the phone number is covered or not.
     */
    #[Optional('has_csr_coverage')]
    public ?bool $hasCsrCoverage;

    /**
     * The phone number that is being verified.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The reason why the phone number is not covered. Only returned if `has_csr_coverage` is false.
     */
    #[Optional]
    public ?string $reason;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AdditionalDataRequired|value-of<AdditionalDataRequired>> $additionalDataRequired
     */
    public static function with(
        ?array $additionalDataRequired = null,
        ?bool $hasCsrCoverage = null,
        ?string $phoneNumber = null,
        ?string $reason = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $additionalDataRequired && $obj['additionalDataRequired'] = $additionalDataRequired;
        null !== $hasCsrCoverage && $obj['hasCsrCoverage'] = $hasCsrCoverage;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $reason && $obj['reason'] = $reason;
        null !== $recordType && $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Additional data required to perform CSR for the phone number. Only returned if `has_csr_coverage` is true.
     *
     * @param list<AdditionalDataRequired|value-of<AdditionalDataRequired>> $additionalDataRequired
     */
    public function withAdditionalDataRequired(
        array $additionalDataRequired
    ): self {
        $obj = clone $this;
        $obj['additionalDataRequired'] = $additionalDataRequired;

        return $obj;
    }

    /**
     * Indicates whether the phone number is covered or not.
     */
    public function withHasCsrCoverage(bool $hasCsrCoverage): self
    {
        $obj = clone $this;
        $obj['hasCsrCoverage'] = $hasCsrCoverage;

        return $obj;
    }

    /**
     * The phone number that is being verified.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The reason why the phone number is not covered. Only returned if `has_csr_coverage` is false.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
