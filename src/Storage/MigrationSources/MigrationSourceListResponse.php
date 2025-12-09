<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\ProviderAuth;

/**
 * @phpstan-type MigrationSourceListResponseShape = array{
 *   data?: list<MigrationSourceParams>|null, meta?: PaginationMetaSimple|null
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
     * @param list<MigrationSourceParams|array{
     *   bucketName: string,
     *   provider: value-of<Provider>,
     *   providerAuth: ProviderAuth,
     *   id?: string|null,
     *   sourceRegion?: string|null,
     * }> $data
     * @param PaginationMetaSimple|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
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
     * @param list<MigrationSourceParams|array{
     *   bucketName: string,
     *   provider: value-of<Provider>,
     *   providerAuth: ProviderAuth,
     *   id?: string|null,
     *   sourceRegion?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaSimple|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
