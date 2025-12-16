<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;

/**
 * @phpstan-import-type MigrationParamsShape from \Telnyx\Storage\Migrations\MigrationParams
 * @phpstan-import-type PaginationMetaSimpleShape from \Telnyx\Storage\Buckets\Usage\PaginationMetaSimple
 *
 * @phpstan-type MigrationListResponseShape = array{
 *   data?: list<MigrationParamsShape>|null,
 *   meta?: null|PaginationMetaSimple|PaginationMetaSimpleShape,
 * }
 */
final class MigrationListResponse implements BaseModel
{
    /** @use SdkModel<MigrationListResponseShape> */
    use SdkModel;

    /** @var list<MigrationParams>|null $data */
    #[Optional(list: MigrationParams::class)]
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
     * @param list<MigrationParamsShape> $data
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
     * @param list<MigrationParamsShape> $data
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
