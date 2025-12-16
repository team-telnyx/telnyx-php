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
 *   status?: null|Status|value-of<Status>,
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
        $self = new self;

        $self['sourceID'] = $sourceID;
        $self['targetBucketName'] = $targetBucketName;
        $self['targetRegion'] = $targetRegion;

        null !== $id && $self['id'] = $id;
        null !== $bytesMigrated && $self['bytesMigrated'] = $bytesMigrated;
        null !== $bytesToMigrate && $self['bytesToMigrate'] = $bytesToMigrate;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $eta && $self['eta'] = $eta;
        null !== $lastCopy && $self['lastCopy'] = $lastCopy;
        null !== $refresh && $self['refresh'] = $refresh;
        null !== $speed && $self['speed'] = $speed;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * ID of the Migration Source from which to migrate data.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    public function withTargetBucketName(string $targetBucketName): self
    {
        $self = clone $this;
        $self['targetBucketName'] = $targetBucketName;

        return $self;
    }

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    public function withTargetRegion(string $targetRegion): self
    {
        $self = clone $this;
        $self['targetRegion'] = $targetRegion;

        return $self;
    }

    /**
     * Unique identifier for the data migration.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Total amount of data that has been succesfully migrated.
     */
    public function withBytesMigrated(int $bytesMigrated): self
    {
        $self = clone $this;
        $self['bytesMigrated'] = $bytesMigrated;

        return $self;
    }

    /**
     * Total amount of data found in source bucket to migrate.
     */
    public function withBytesToMigrate(int $bytesToMigrate): self
    {
        $self = clone $this;
        $self['bytesToMigrate'] = $bytesToMigrate;

        return $self;
    }

    /**
     * Time when data migration was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Estimated time the migration will complete.
     */
    public function withEta(\DateTimeInterface $eta): self
    {
        $self = clone $this;
        $self['eta'] = $eta;

        return $self;
    }

    /**
     * Time when data migration was last copied from the source.
     */
    public function withLastCopy(\DateTimeInterface $lastCopy): self
    {
        $self = clone $this;
        $self['lastCopy'] = $lastCopy;

        return $self;
    }

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    public function withRefresh(bool $refresh): self
    {
        $self = clone $this;
        $self['refresh'] = $refresh;

        return $self;
    }

    /**
     * Current speed of the migration.
     */
    public function withSpeed(int $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }

    /**
     * Status of the migration.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
