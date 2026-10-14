<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\CallReasons\BrandedCallingPaginationMeta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data;

/**
 * Paginated list of a DIR's BPO authorizations.
 *
 * @phpstan-import-type DataShape from \Telnyx\Dir\DirGetBpoAuthorizationsResponse\Data
 * @phpstan-import-type BrandedCallingPaginationMetaShape from \Telnyx\CallReasons\BrandedCallingPaginationMeta
 *
 * @phpstan-type DirGetBpoAuthorizationsResponseShape = array{
 *   data: list<Data|DataShape>,
 *   meta: BrandedCallingPaginationMeta|BrandedCallingPaginationMetaShape,
 * }
 */
final class DirGetBpoAuthorizationsResponse implements BaseModel
{
    /** @use SdkModel<DirGetBpoAuthorizationsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
     */
    #[Required]
    public BrandedCallingPaginationMeta $meta;

    /**
     * `new DirGetBpoAuthorizationsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirGetBpoAuthorizationsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirGetBpoAuthorizationsResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|DataShape> $data
     * @param BrandedCallingPaginationMeta|BrandedCallingPaginationMetaShape $meta
     */
    public static function with(
        array $data,
        BrandedCallingPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
     *
     * @param BrandedCallingPaginationMeta|BrandedCallingPaginationMetaShape $meta
     */
    public function withMeta(BrandedCallingPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
