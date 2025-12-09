<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data\AdditionalDataRequired;

/**
 * @phpstan-type CustomerServiceRecordVerifyPhoneNumberCoverageResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class CustomerServiceRecordVerifyPhoneNumberCoverageResponse implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordVerifyPhoneNumberCoverageResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   additionalDataRequired?: list<value-of<AdditionalDataRequired>>|null,
     *   hasCsrCoverage?: bool|null,
     *   phoneNumber?: string|null,
     *   reason?: string|null,
     *   recordType?: string|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   additionalDataRequired?: list<value-of<AdditionalDataRequired>>|null,
     *   hasCsrCoverage?: bool|null,
     *   phoneNumber?: string|null,
     *   reason?: string|null,
     *   recordType?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
