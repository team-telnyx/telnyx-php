<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\Storage\Migrations\MigrationParams\Status;

/**
 * @phpstan-type MigrationListResponseShape = array{
 *   data?: list<MigrationParams>|null, meta?: PaginationMetaSimple|null
 * }
 */
final class MigrationListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MigrationListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<MigrationParams>|null $data */
    #[Api(list: MigrationParams::class, optional: true)]
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
     * @param list<MigrationParams|array{
     *   source_id: string,
     *   target_bucket_name: string,
     *   target_region: string,
     *   id?: string|null,
     *   bytes_migrated?: int|null,
     *   bytes_to_migrate?: int|null,
     *   created_at?: \DateTimeInterface|null,
     *   eta?: \DateTimeInterface|null,
     *   last_copy?: \DateTimeInterface|null,
     *   refresh?: bool|null,
     *   speed?: int|null,
     *   status?: value-of<Status>|null,
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
     * @param list<MigrationParams|array{
     *   source_id: string,
     *   target_bucket_name: string,
     *   target_region: string,
     *   id?: string|null,
     *   bytes_migrated?: int|null,
     *   bytes_to_migrate?: int|null,
     *   created_at?: \DateTimeInterface|null,
     *   eta?: \DateTimeInterface|null,
     *   last_copy?: \DateTimeInterface|null,
     *   refresh?: bool|null,
     *   speed?: int|null,
     *   status?: value-of<Status>|null,
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
