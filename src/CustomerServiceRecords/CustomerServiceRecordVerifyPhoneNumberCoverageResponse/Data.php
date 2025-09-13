<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data\AdditionalDataRequired;

/**
 * @phpstan-type data_alias = array{
 *   additionalDataRequired?: list<value-of<AdditionalDataRequired>>,
 *   hasCsrCoverage?: bool,
 *   phoneNumber?: string,
 *   reason?: string,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Additional data required to perform CSR for the phone number. Only returned if `has_csr_coverage` is true.
     *
     * @var list<value-of<AdditionalDataRequired>>|null $additionalDataRequired
     */
    #[Api(
        'additional_data_required',
        list: AdditionalDataRequired::class,
        optional: true,
    )]
    public ?array $additionalDataRequired;

    /**
     * Indicates whether the phone number is covered or not.
     */
    #[Api('has_csr_coverage', optional: true)]
    public ?bool $hasCsrCoverage;

    /**
     * The phone number that is being verified.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * The reason why the phone number is not covered. Only returned if `has_csr_coverage` is false.
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
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

        null !== $additionalDataRequired && $obj->additionalDataRequired = array_map(fn ($v) => $v instanceof AdditionalDataRequired ? $v->value : $v, $additionalDataRequired);
        null !== $hasCsrCoverage && $obj->hasCsrCoverage = $hasCsrCoverage;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $reason && $obj->reason = $reason;
        null !== $recordType && $obj->recordType = $recordType;

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
        $obj->additionalDataRequired = array_map(fn ($v) => $v instanceof AdditionalDataRequired ? $v->value : $v, $additionalDataRequired);

        return $obj;
    }

    /**
     * Indicates whether the phone number is covered or not.
     */
    public function withHasCsrCoverage(bool $hasCsrCoverage): self
    {
        $obj = clone $this;
        $obj->hasCsrCoverage = $hasCsrCoverage;

        return $obj;
    }

    /**
     * The phone number that is being verified.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
        $obj->recordType = $recordType;

        return $obj;
    }
}
