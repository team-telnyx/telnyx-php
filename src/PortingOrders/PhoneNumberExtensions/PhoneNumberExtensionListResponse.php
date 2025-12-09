<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-type PhoneNumberExtensionListResponseShape = array{
 *   data?: list<PortingPhoneNumberExtension>|null, meta?: PaginationMeta|null
 * }
 */
final class PhoneNumberExtensionListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionListResponseShape> */
    use SdkModel;

    /** @var list<PortingPhoneNumberExtension>|null $data */
    #[Optional(list: PortingPhoneNumberExtension::class)]
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
     * @param list<PortingPhoneNumberExtension|array{
     *   id?: string|null,
     *   activationRanges?: list<ActivationRange>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   extensionRange?: ExtensionRange|null,
     *   portingPhoneNumberID?: string|null,
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
     * @param list<PortingPhoneNumberExtension|array{
     *   id?: string|null,
     *   activationRanges?: list<ActivationRange>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   extensionRange?: ExtensionRange|null,
     *   portingPhoneNumberID?: string|null,
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
