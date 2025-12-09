<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklists\WirelessBlocklist\Type;

/**
 * @phpstan-type WirelessBlocklistListResponseShape = array{
 *   data?: list<WirelessBlocklist>|null, meta?: PaginationMeta|null
 * }
 */
final class WirelessBlocklistListResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistListResponseShape> */
    use SdkModel;

    /** @var list<WirelessBlocklist>|null $data */
    #[Optional(list: WirelessBlocklist::class)]
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
     * @param list<WirelessBlocklist|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   values?: list<string>|null,
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
     * @param list<WirelessBlocklist|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   values?: list<string>|null,
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
