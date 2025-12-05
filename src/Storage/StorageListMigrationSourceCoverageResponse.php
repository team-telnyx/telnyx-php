<?php

declare(strict_types=1);

namespace Telnyx\Storage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data\Provider;

/**
 * @phpstan-type StorageListMigrationSourceCoverageResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMetaSimple|null
 * }
 */
final class StorageListMigrationSourceCoverageResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<StorageListMigrationSourceCoverageResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<Data|array{
     *   provider?: value-of<Provider>|null, source_region?: string|null
     * }> $data
     * @param PaginationMetaSimple|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMetaSimple|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   provider?: value-of<Provider>|null, source_region?: string|null
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMetaSimple|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
