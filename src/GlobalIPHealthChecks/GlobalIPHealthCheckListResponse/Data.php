<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 *   globalIPID?: string|null,
 *   healthCheckParams?: array<string,mixed>|null,
 *   healthCheckType?: string|null,
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
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * Global IP ID.
     */
    #[Optional('global_ip_id')]
    public ?string $globalIPID;

    /**
     * A Global IP health check params.
     *
     * @var array<string,mixed>|null $healthCheckParams
     */
    #[Optional('health_check_params', map: 'mixed')]
    public ?array $healthCheckParams;

    /**
     * The Global IP health check type.
     */
    #[Optional('health_check_type')]
    public ?string $healthCheckType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $healthCheckParams
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $globalIPID = null,
        ?array $healthCheckParams = null,
        ?string $healthCheckType = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $globalIPID && $obj['globalIPID'] = $globalIPID;
        null !== $healthCheckParams && $obj['healthCheckParams'] = $healthCheckParams;
        null !== $healthCheckType && $obj['healthCheckType'] = $healthCheckType;

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
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIpid(string $globalIPID): self
    {
        $obj = clone $this;
        $obj['globalIPID'] = $globalIPID;

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
        $obj['healthCheckParams'] = $healthCheckParams;

        return $obj;
    }

    /**
     * The Global IP health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $obj = clone $this;
        $obj['healthCheckType'] = $healthCheckType;

        return $obj;
    }
}
