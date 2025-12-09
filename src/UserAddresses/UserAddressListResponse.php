<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UserAddressListResponseShape = array{
 *   data?: list<UserAddress>|null, meta?: PaginationMeta|null
 * }
 */
final class UserAddressListResponse implements BaseModel
{
    /** @use SdkModel<UserAddressListResponseShape> */
    use SdkModel;

    /** @var list<UserAddress>|null $data */
    #[Optional(list: UserAddress::class)]
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
     * @param list<UserAddress|array{
     *   id?: string|null,
     *   administrativeArea?: string|null,
     *   borough?: string|null,
     *   businessName?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   extendedAddress?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phoneNumber?: string|null,
     *   postalCode?: string|null,
     *   recordType?: string|null,
     *   streetAddress?: string|null,
     *   updatedAt?: string|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<UserAddress|array{
     *   id?: string|null,
     *   administrativeArea?: string|null,
     *   borough?: string|null,
     *   businessName?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   extendedAddress?: string|null,
     *   firstName?: string|null,
     *   lastName?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phoneNumber?: string|null,
     *   postalCode?: string|null,
     *   recordType?: string|null,
     *   streetAddress?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
