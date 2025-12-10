<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPAddress\CloudflareSyncStatus;
use Telnyx\AccessIPAddress\PaginationMetaCloudflareIPListSync;
use Telnyx\Core\Attributes\Required;
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
    #[Required(list: AccessIPRange::class)]
    public array $data;

    #[Required]
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
     *   cidrBlock: string,
     *   status: value-of<CloudflareSyncStatus>,
     *   userID: string,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMetaCloudflareIPListSync|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(
        array $data,
        PaginationMetaCloudflareIPListSync|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<AccessIPRange|array{
     *   id: string,
     *   cidrBlock: string,
     *   status: value-of<CloudflareSyncStatus>,
     *   userID: string,
     *   createdAt?: \DateTimeInterface|null,
     *   description?: string|null,
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
     * @param PaginationMetaCloudflareIPListSync|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(
        PaginationMetaCloudflareIPListSync|array $meta
    ): self {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
