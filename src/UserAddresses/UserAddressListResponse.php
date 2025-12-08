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
     *   administrative_area?: string|null,
     *   borough?: string|null,
     *   business_name?: string|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   extended_address?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phone_number?: string|null,
     *   postal_code?: string|null,
     *   record_type?: string|null,
     *   street_address?: string|null,
     *   updated_at?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     *   administrative_area?: string|null,
     *   borough?: string|null,
     *   business_name?: string|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   extended_address?: string|null,
     *   first_name?: string|null,
     *   last_name?: string|null,
     *   locality?: string|null,
     *   neighborhood?: string|null,
     *   phone_number?: string|null,
     *   postal_code?: string|null,
     *   record_type?: string|null,
     *   street_address?: string|null,
     *   updated_at?: string|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
