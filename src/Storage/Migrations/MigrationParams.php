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
 * }
 */
final class MigrationParams implements BaseModel
{
    /** @use SdkModel<MigrationParamsShape> */
    use SdkModel;

    /**
     * ID of the Migration Source from which to migrate data.
     */
    #[Required('source_id')]
    public string $sourceID;

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    #[Required('target_bucket_name')]
    public string $targetBucketName;

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    #[Required('target_region')]
    public string $targetRegion;

    /**
     * Unique identifier for the data migration.
     */
    #[Optional]
    public ?string $id;

    /**
     * Total amount of data that has been succesfully migrated.
     */
    #[Optional('bytes_migrated')]
    public ?int $bytesMigrated;

    /**
     * Total amount of data found in source bucket to migrate.
     */
    #[Optional('bytes_to_migrate')]
    public ?int $bytesToMigrate;

    /**
     * Time when data migration was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Estimated time the migration will complete.
     */
    #[Optional]
    public ?\DateTimeInterface $eta;

    /**
     * Time when data migration was last copied from the source.
     */
    #[Optional('last_copy')]
    public ?\DateTimeInterface $lastCopy;

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
     * MigrationParams::with(sourceID: ..., targetBucketName: ..., targetRegion: ...)
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
        string $sourceID,
        string $targetBucketName,
        string $targetRegion,
        ?string $id = null,
        ?int $bytesMigrated = null,
        ?int $bytesToMigrate = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $eta = null,
        ?\DateTimeInterface $lastCopy = null,
        ?bool $refresh = null,
        ?int $speed = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        $obj['sourceID'] = $sourceID;
        $obj['targetBucketName'] = $targetBucketName;
        $obj['targetRegion'] = $targetRegion;

        null !== $id && $obj['id'] = $id;
        null !== $bytesMigrated && $obj['bytesMigrated'] = $bytesMigrated;
        null !== $bytesToMigrate && $obj['bytesToMigrate'] = $bytesToMigrate;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $eta && $obj['eta'] = $eta;
        null !== $lastCopy && $obj['lastCopy'] = $lastCopy;
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
        $obj['sourceID'] = $sourceID;

        return $obj;
    }

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    public function withTargetBucketName(string $targetBucketName): self
    {
        $obj = clone $this;
        $obj['targetBucketName'] = $targetBucketName;

        return $obj;
    }

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    public function withTargetRegion(string $targetRegion): self
    {
        $obj = clone $this;
        $obj['targetRegion'] = $targetRegion;

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
        $obj['bytesMigrated'] = $bytesMigrated;

        return $obj;
    }

    /**
     * Total amount of data found in source bucket to migrate.
     */
    public function withBytesToMigrate(int $bytesToMigrate): self
    {
        $obj = clone $this;
        $obj['bytesToMigrate'] = $bytesToMigrate;

        return $obj;
    }

    /**
     * Time when data migration was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['lastCopy'] = $lastCopy;

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
