<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Migrations\MigrationParams\Status;

/**
 * @phpstan-type MigrationParamsShape = array{
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
 * }
 */
final class MigrationParams implements BaseModel
{
    /** @use SdkModel<MigrationParamsShape> */
    use SdkModel;

    /**
     * ID of the Migration Source from which to migrate data.
     */
    #[Required]
    public string $source_id;

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    #[Required]
    public string $target_bucket_name;

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    #[Required]
    public string $target_region;

    /**
     * Unique identifier for the data migration.
     */
    #[Optional]
    public ?string $id;

    /**
     * Total amount of data that has been succesfully migrated.
     */
    #[Optional]
    public ?int $bytes_migrated;

    /**
     * Total amount of data found in source bucket to migrate.
     */
    #[Optional]
    public ?int $bytes_to_migrate;

    /**
     * Time when data migration was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Estimated time the migration will complete.
     */
    #[Optional]
    public ?\DateTimeInterface $eta;

    /**
     * Time when data migration was last copied from the source.
     */
    #[Optional]
    public ?\DateTimeInterface $last_copy;

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    #[Optional]
    public ?bool $refresh;

    /**
     * Current speed of the migration.
     */
    #[Optional]
    public ?int $speed;

    /**
     * Status of the migration.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * `new MigrationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MigrationParams::with(
     *   source_id: ..., target_bucket_name: ..., target_region: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MigrationParams)
     *   ->withSourceID(...)
     *   ->withTargetBucketName(...)
     *   ->withTargetRegion(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $source_id,
        string $target_bucket_name,
        string $target_region,
        ?string $id = null,
        ?int $bytes_migrated = null,
        ?int $bytes_to_migrate = null,
        ?\DateTimeInterface $created_at = null,
        ?\DateTimeInterface $eta = null,
        ?\DateTimeInterface $last_copy = null,
        ?bool $refresh = null,
        ?int $speed = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        $obj['source_id'] = $source_id;
        $obj['target_bucket_name'] = $target_bucket_name;
        $obj['target_region'] = $target_region;

        null !== $id && $obj['id'] = $id;
        null !== $bytes_migrated && $obj['bytes_migrated'] = $bytes_migrated;
        null !== $bytes_to_migrate && $obj['bytes_to_migrate'] = $bytes_to_migrate;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $eta && $obj['eta'] = $eta;
        null !== $last_copy && $obj['last_copy'] = $last_copy;
        null !== $refresh && $obj['refresh'] = $refresh;
        null !== $speed && $obj['speed'] = $speed;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * ID of the Migration Source from which to migrate data.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj['source_id'] = $sourceID;

        return $obj;
    }

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    public function withTargetBucketName(string $targetBucketName): self
    {
        $obj = clone $this;
        $obj['target_bucket_name'] = $targetBucketName;

        return $obj;
    }

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    public function withTargetRegion(string $targetRegion): self
    {
        $obj = clone $this;
        $obj['target_region'] = $targetRegion;

        return $obj;
    }

    /**
     * Unique identifier for the data migration.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Total amount of data that has been succesfully migrated.
     */
    public function withBytesMigrated(int $bytesMigrated): self
    {
        $obj = clone $this;
        $obj['bytes_migrated'] = $bytesMigrated;

        return $obj;
    }

    /**
     * Total amount of data found in source bucket to migrate.
     */
    public function withBytesToMigrate(int $bytesToMigrate): self
    {
        $obj = clone $this;
        $obj['bytes_to_migrate'] = $bytesToMigrate;

        return $obj;
    }

    /**
     * Time when data migration was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Estimated time the migration will complete.
     */
    public function withEta(\DateTimeInterface $eta): self
    {
        $obj = clone $this;
        $obj['eta'] = $eta;

        return $obj;
    }

    /**
     * Time when data migration was last copied from the source.
     */
    public function withLastCopy(\DateTimeInterface $lastCopy): self
    {
        $obj = clone $this;
        $obj['last_copy'] = $lastCopy;

        return $obj;
    }

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    public function withRefresh(bool $refresh): self
    {
        $obj = clone $this;
        $obj['refresh'] = $refresh;

        return $obj;
    }

    /**
     * Current speed of the migration.
     */
    public function withSpeed(int $speed): self
    {
        $obj = clone $this;
        $obj['speed'] = $speed;

        return $obj;
    }

    /**
     * Status of the migration.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
