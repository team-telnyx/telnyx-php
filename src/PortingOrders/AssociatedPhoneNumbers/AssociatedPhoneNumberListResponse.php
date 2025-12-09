<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberType;

/**
 * @phpstan-type AssociatedPhoneNumberListResponseShape = array{
 *   data?: list<PortingAssociatedPhoneNumber>|null, meta?: PaginationMeta|null
 * }
 */
final class AssociatedPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<PortingAssociatedPhoneNumber>|null $data */
    #[Optional(list: PortingAssociatedPhoneNumber::class)]
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
     * @param list<PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   phoneNumberRange?: PhoneNumberRange|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     * @param list<PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   phoneNumberRange?: PhoneNumberRange|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
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
