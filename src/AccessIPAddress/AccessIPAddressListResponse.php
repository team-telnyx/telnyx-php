<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Required;
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
    #[Required(list: AccessIPAddressResponse::class)]
    public array $data;

    #[Required]
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
     *   ipAddress: string,
     *   source: string,
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
     * @param list<AccessIPAddressResponse|array{
     *   id: string,
     *   ipAddress: string,
     *   source: string,
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
