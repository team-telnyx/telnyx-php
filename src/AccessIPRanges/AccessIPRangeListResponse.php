<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPAddress\CloudflareSyncStatus;
use Telnyx\AccessIPAddress\PaginationMetaCloudflareIPListSync;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccessIPRangeListResponseShape = array{
 *   data: list<AccessIPRange>, meta: PaginationMetaCloudflareIPListSync
 * }
 */
final class AccessIPRangeListResponse implements BaseModel
{
    /** @use SdkModel<AccessIPRangeListResponseShape> */
    use SdkModel;

    /** @var list<AccessIPRange> $data */
    #[Api(list: AccessIPRange::class)]
    public array $data;

    #[Api]
    public PaginationMetaCloudflareIPListSync $meta;

    /**
     * `new AccessIPRangeListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPRangeListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPRangeListResponse)->withData(...)->withMeta(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AccessIPRange|array{
     *   id: string,
     *   cidr_block: string,
     *   status: value-of<CloudflareSyncStatus>,
     *   user_id: string,
     *   created_at?: \DateTimeInterface|null,
     *   description?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMetaCloudflareIPListSync|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(
        array $data,
        PaginationMetaCloudflareIPListSync|array $meta
    ): self {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<AccessIPRange|array{
     *   id: string,
     *   cidr_block: string,
     *   status: value-of<CloudflareSyncStatus>,
     *   user_id: string,
     *   created_at?: \DateTimeInterface|null,
     *   description?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMetaCloudflareIPListSync|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(
        PaginationMetaCloudflareIPListSync|array $meta
    ): self {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
