<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;

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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $globalIPID && $self['globalIPID'] = $globalIPID;
        null !== $healthCheckParams && $self['healthCheckParams'] = $healthCheckParams;
        null !== $healthCheckType && $self['healthCheckType'] = $healthCheckType;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIpid(string $globalIPID): self
    {
        $self = clone $this;
        $self['globalIPID'] = $globalIPID;

        return $self;
    }

    /**
     * A Global IP health check params.
     *
     * @param array<string,mixed> $healthCheckParams
     */
    public function withHealthCheckParams(array $healthCheckParams): self
    {
        $self = clone $this;
        $self['healthCheckParams'] = $healthCheckParams;

        return $self;
    }

    /**
     * The Global IP health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $self = clone $this;
        $self['healthCheckType'] = $healthCheckType;

        return $self;
    }
}
