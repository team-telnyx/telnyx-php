<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Migrations\MigrationParams\Status;

/**
 * @phpstan-type MigrationGetResponseShape = array{data?: MigrationParams|null}
 */
final class MigrationGetResponse implements BaseModel
{
    /** @use SdkModel<MigrationGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MigrationParams $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MigrationParams|array{
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
     * } $data
     */
    public static function with(MigrationParams|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MigrationParams|array{
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
     * } $data
     */
    public function withData(MigrationParams|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
