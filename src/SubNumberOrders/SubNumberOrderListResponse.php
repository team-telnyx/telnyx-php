<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrder\PhoneNumberType;
use Telnyx\SubNumberOrders\SubNumberOrder\Status;

/**
 * @phpstan-type SubNumberOrderListResponseShape = array{
 *   data?: list<SubNumberOrder>|null, meta?: PaginationMeta|null
 * }
 */
final class SubNumberOrderListResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderListResponseShape> */
    use SdkModel;

    /** @var list<SubNumberOrder>|null $data */
    #[Optional(list: SubNumberOrder::class)]
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
     * @param list<SubNumberOrder|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   isBlockSubNumberOrder?: bool|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     * @param list<SubNumberOrder|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   isBlockSubNumberOrder?: bool|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
