<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data\AdditionalDataRequired;

/**
 * @phpstan-type DataShape = array{
 *   additionalDataRequired?: list<AdditionalDataRequired|value-of<AdditionalDataRequired>>|null,
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
        $self = new self;

        null !== $additionalDataRequired && $self['additionalDataRequired'] = $additionalDataRequired;
        null !== $hasCsrCoverage && $self['hasCsrCoverage'] = $hasCsrCoverage;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $reason && $self['reason'] = $reason;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Additional data required to perform CSR for the phone number. Only returned if `has_csr_coverage` is true.
     *
     * @param list<AdditionalDataRequired|value-of<AdditionalDataRequired>> $additionalDataRequired
     */
    public function withAdditionalDataRequired(
        array $additionalDataRequired
    ): self {
        $self = clone $this;
        $self['additionalDataRequired'] = $additionalDataRequired;

        return $self;
    }

    /**
     * Indicates whether the phone number is covered or not.
     */
    public function withHasCsrCoverage(bool $hasCsrCoverage): self
    {
        $self = clone $this;
        $self['hasCsrCoverage'] = $hasCsrCoverage;

        return $self;
    }

    /**
     * The phone number that is being verified.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The reason why the phone number is not covered. Only returned if `has_csr_coverage` is false.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
