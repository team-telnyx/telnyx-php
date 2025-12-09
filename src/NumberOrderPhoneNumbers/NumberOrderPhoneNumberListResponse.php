<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\PhoneNumberType;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\RequirementsStatus;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type NumberOrderPhoneNumberListResponseShape = array{
 *   data?: list<NumberOrderPhoneNumber>|null, meta?: PaginationMeta|null
 * }
 */
final class NumberOrderPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<NumberOrderPhoneNumber>|null $data */
    #[Optional(list: NumberOrderPhoneNumber::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   isBlockNumber?: bool|null,
     *   locality?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrderID?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   isBlockNumber?: bool|null,
     *   locality?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrderID?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
