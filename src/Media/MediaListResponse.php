<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MediaResourceShape from \Telnyx\Media\MediaResource
 * @phpstan-import-type PaginationMetaShape from \Telnyx\AuthenticationProviders\PaginationMeta
 *
 * @phpstan-type MediaListResponseShape = array{
 *   data?: list<MediaResourceShape>|null,
 *   meta?: null|PaginationMeta|PaginationMetaShape,
 * }
 */
final class MediaListResponse implements BaseModel
{
    /** @use SdkModel<MediaListResponseShape> */
    use SdkModel;

    /** @var list<MediaResource>|null $data */
    #[Optional(list: MediaResource::class)]
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
     * @param list<MediaResourceShape>|null $data
     * @param PaginationMeta|PaginationMetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MediaResourceShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|PaginationMetaShape $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
