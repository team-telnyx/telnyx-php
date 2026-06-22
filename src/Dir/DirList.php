<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\CallReasons\BrandedCallingPaginationMeta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DirShape from \Telnyx\Dir\Dir
 * @phpstan-import-type BrandedCallingPaginationMetaShape from \Telnyx\CallReasons\BrandedCallingPaginationMeta
 *
 * @phpstan-type DirListShape = array{
 *   data: list<Dir|DirShape>,
 *   meta: BrandedCallingPaginationMeta|BrandedCallingPaginationMetaShape,
 * }
 */
final class DirList implements BaseModel
{
    /** @use SdkModel<DirListShape> */
    use SdkModel;

    /** @var list<Dir> $data */
    #[Required(list: Dir::class)]
    public array $data;

    /**
     * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
     */
    #[Required]
    public BrandedCallingPaginationMeta $meta;

    /**
     * `new DirList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirList::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirList)->withData(...)->withMeta(...)
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
     * @param list<Dir|DirShape> $data
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
     * @param list<Dir|DirShape> $data
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
