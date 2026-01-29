<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;

/**
 * @phpstan-import-type MigrationSourceParamsShape from \Telnyx\Storage\MigrationSources\MigrationSourceParams
 * @phpstan-import-type PaginationMetaSimpleShape from \Telnyx\Storage\Buckets\Usage\PaginationMetaSimple
 *
 * @phpstan-type MigrationSourceListResponseShape = array{
 *   data?: list<MigrationSourceParams|MigrationSourceParamsShape>|null,
 *   meta?: null|PaginationMetaSimple|PaginationMetaSimpleShape,
 * }
 */
final class MigrationSourceListResponse implements BaseModel
{
    /** @use SdkModel<MigrationSourceListResponseShape> */
    use SdkModel;

    /** @var list<MigrationSourceParams>|null $data */
    #[Optional(list: MigrationSourceParams::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMetaSimple $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MigrationSourceParams|MigrationSourceParamsShape>|null $data
     * @param PaginationMetaSimple|PaginationMetaSimpleShape|null $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaSimple|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<MigrationSourceParams|MigrationSourceParamsShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaSimple|PaginationMetaSimpleShape $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
