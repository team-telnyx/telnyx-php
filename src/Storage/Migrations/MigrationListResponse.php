<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\PaginationMetaSimple;
use Telnyx\Storage\Migrations\MigrationParams\Status;

/**
 * @phpstan-type MigrationListResponseShape = array{
 *   data?: list<MigrationParams>|null, meta?: PaginationMetaSimple|null
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
     * @param list<MigrationParams|array{
     *   sourceID: string,
     *   targetBucketName: string,
     *   targetRegion: string,
     *   id?: string|null,
     *   bytesMigrated?: int|null,
     *   bytesToMigrate?: int|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eta?: \DateTimeInterface|null,
     *   lastCopy?: \DateTimeInterface|null,
     *   refresh?: bool|null,
     *   speed?: int|null,
     *   status?: value-of<Status>|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<MigrationParams|array{
     *   sourceID: string,
     *   targetBucketName: string,
     *   targetRegion: string,
     *   id?: string|null,
     *   bytesMigrated?: int|null,
     *   bytesToMigrate?: int|null,
     *   createdAt?: \DateTimeInterface|null,
     *   eta?: \DateTimeInterface|null,
     *   lastCopy?: \DateTimeInterface|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMetaSimple|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
