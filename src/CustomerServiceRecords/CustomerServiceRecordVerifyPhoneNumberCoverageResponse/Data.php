<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data\AdditionalDataRequired;

/**
 * @phpstan-type DataShape = array{
 *   additional_data_required?: list<value-of<AdditionalDataRequired>>|null,
 *   has_csr_coverage?: bool|null,
 *   phone_number?: string|null,
 *   reason?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Additional data required to perform CSR for the phone number. Only returned if `has_csr_coverage` is true.
     *
     * @var list<value-of<AdditionalDataRequired>>|null $additional_data_required
     */
    #[Api(list: AdditionalDataRequired::class, optional: true)]
    public ?array $additional_data_required;

    /**
     * Indicates whether the phone number is covered or not.
     */
    #[Api(optional: true)]
    public ?bool $has_csr_coverage;

    /**
     * The phone number that is being verified.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * The reason why the phone number is not covered. Only returned if `has_csr_coverage` is false.
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AdditionalDataRequired|value-of<AdditionalDataRequired>> $additional_data_required
     */
    public static function with(
        ?array $additional_data_required = null,
        ?bool $has_csr_coverage = null,
        ?string $phone_number = null,
        ?string $reason = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $additional_data_required && $obj['additional_data_required'] = $additional_data_required;
        null !== $has_csr_coverage && $obj->has_csr_coverage = $has_csr_coverage;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $reason && $obj->reason = $reason;
        null !== $record_type && $obj->record_type = $record_type;

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
        $obj['additional_data_required'] = $additionalDataRequired;

        return $obj;
    }

    /**
     * Indicates whether the phone number is covered or not.
     */
    public function withHasCsrCoverage(bool $hasCsrCoverage): self
    {
        $obj = clone $this;
        $obj->has_csr_coverage = $hasCsrCoverage;

        return $obj;
    }

    /**
     * The phone number that is being verified.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * The reason why the phone number is not covered. Only returned if `has_csr_coverage` is false.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
