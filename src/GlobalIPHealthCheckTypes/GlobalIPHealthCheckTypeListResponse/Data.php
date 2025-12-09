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
     * @param array<string,mixed> $healthCheckParams
     */
    public static function with(
        ?array $healthCheckParams = null,
        ?string $healthCheckType = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $healthCheckParams && $obj['healthCheckParams'] = $healthCheckParams;
        null !== $healthCheckType && $obj['healthCheckType'] = $healthCheckType;
        null !== $recordType && $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Global IP Health check params.
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
     * Global IP Health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $obj = clone $this;
        $obj['healthCheckType'] = $healthCheckType;

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
}
