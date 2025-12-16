<?php

declare(strict_types=1);

namespace Telnyx\Storage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data
 * @phpstan-import-type PaginationMetaSimpleShape from \Telnyx\Storage\Buckets\Usage\PaginationMetaSimple
 *
 * @phpstan-type StorageListMigrationSourceCoverageResponseShape = array{
 *   data?: list<DataShape>|null,
 *   meta?: null|PaginationMetaSimple|PaginationMetaSimpleShape,
 * }
 */
final class StorageListMigrationSourceCoverageResponse implements BaseModel
{
    /** @use SdkModel<StorageListMigrationSourceCoverageResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<DataShape> $data
     * @param PaginationMetaSimpleShape $meta
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
     * @param list<DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaSimpleShape $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
