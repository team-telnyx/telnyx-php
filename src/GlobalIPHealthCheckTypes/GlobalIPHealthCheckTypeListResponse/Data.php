<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   healthCheckParams?: array<string,mixed>|null,
 *   healthCheckType?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Global IP Health check params.
     *
     * @var array<string,mixed>|null $healthCheckParams
     */
    #[Optional('health_check_params', map: 'mixed')]
    public ?array $healthCheckParams;

    /**
     * Global IP Health check type.
     */
    #[Optional('health_check_type')]
    public ?string $healthCheckType;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $healthCheckParams
     */
    public static function with(
        ?array $healthCheckParams = null,
        ?string $healthCheckType = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $healthCheckParams && $self['healthCheckParams'] = $healthCheckParams;
        null !== $healthCheckType && $self['healthCheckType'] = $healthCheckType;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Global IP Health check params.
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
     * Global IP Health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $self = clone $this;
        $self['healthCheckType'] = $healthCheckType;

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
}
