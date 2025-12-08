<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccessIPAddressListResponseShape = array{
 *   data: list<AccessIPAddressResponse>, meta: PaginationMetaCloudflareIPListSync
 * }
 */
final class AccessIPAddressListResponse implements BaseModel
{
    /** @use SdkModel<AccessIPAddressListResponseShape> */
    use SdkModel;

    /** @var list<AccessIPAddressResponse> $data */
    #[Api(list: AccessIPAddressResponse::class)]
    public array $data;

    #[Api]
    public PaginationMetaCloudflareIPListSync $meta;

    /**
     * `new AccessIPAddressListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPAddressListResponse)->withData(...)->withMeta(...)
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
     * @param list<AccessIPAddressResponse|array{
     *   id: string,
     *   ip_address: string,
     *   source: string,
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
     * @param list<AccessIPAddressResponse|array{
     *   id: string,
     *   ip_address: string,
     *   source: string,
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
