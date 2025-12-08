<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckDeleteResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 *   global_ip_id?: string|null,
 *   health_check_params?: array<string,mixed>|null,
 *   health_check_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

    /**
     * Global IP ID.
     */
    #[Optional]
    public ?string $global_ip_id;

    /**
     * A Global IP health check params.
     *
     * @var array<string,mixed>|null $health_check_params
     */
    #[Optional(map: 'mixed')]
    public ?array $health_check_params;

    /**
     * The Global IP health check type.
     */
    #[Optional]
    public ?string $health_check_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $health_check_params
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $updated_at = null,
        ?string $global_ip_id = null,
        ?array $health_check_params = null,
        ?string $health_check_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $global_ip_id && $obj['global_ip_id'] = $global_ip_id;
        null !== $health_check_params && $obj['health_check_params'] = $health_check_params;
        null !== $health_check_type && $obj['health_check_type'] = $health_check_type;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIPID(string $globalIPID): self
    {
        $obj = clone $this;
        $obj['global_ip_id'] = $globalIPID;

        return $obj;
    }

    /**
     * A Global IP health check params.
     *
     * @param array<string,mixed> $healthCheckParams
     */
    public function withHealthCheckParams(array $healthCheckParams): self
    {
        $obj = clone $this;
        $obj['health_check_params'] = $healthCheckParams;

        return $obj;
    }

    /**
     * The Global IP health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $obj = clone $this;
        $obj['health_check_type'] = $healthCheckType;

        return $obj;
    }
}
