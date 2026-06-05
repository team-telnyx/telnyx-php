<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirListDocumentTypesResponse\Data;
use Telnyx\Dir\DirListDocumentTypesResponse\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\Dir\DirListDocumentTypesResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\Dir\DirListDocumentTypesResponse\Meta
 *
 * @phpstan-type DirListDocumentTypesResponseShape = array{
 *   data: list<Data|DataShape>, meta: Meta|MetaShape
 * }
 */
final class DirListDocumentTypesResponse implements BaseModel
{
    /** @use SdkModel<DirListDocumentTypesResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
     */
    #[Required]
    public Meta $meta;

    /**
     * `new DirListDocumentTypesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirListDocumentTypesResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirListDocumentTypesResponse)->withData(...)->withMeta(...)
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
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
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
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
