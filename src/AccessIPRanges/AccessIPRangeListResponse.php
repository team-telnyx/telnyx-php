<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPAddress\PaginationMetaCloudflareIPListSync;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AccessIPRangeListResponseShape = array{
 *   data: list<AccessIPRange>, meta: PaginationMetaCloudflareIPListSync
 * }
 */
final class AccessIPRangeListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AccessIPRangeListResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     * @param list<AccessIPRange> $data
     */
    public static function with(
        array $data,
        PaginationMetaCloudflareIPListSync $meta
    ): self {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<AccessIPRange> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMetaCloudflareIPListSync $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
