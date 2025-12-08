<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Migrations\MigrationParams\Status;

/**
 * @phpstan-type MigrationNewResponseShape = array{data?: MigrationParams|null}
 */
final class MigrationNewResponse implements BaseModel
{
    /** @use SdkModel<MigrationNewResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     * } $data
     */
    public static function with(MigrationParams|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MigrationParams|array{
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
     * } $data
     */
    public function withData(MigrationParams|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
