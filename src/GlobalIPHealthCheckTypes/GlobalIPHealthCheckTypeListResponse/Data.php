<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   health_check_params?: array<string,mixed>|null,
 *   health_check_type?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Global IP Health check params.
     *
     * @var array<string,mixed>|null $health_check_params
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $health_check_params;

    /**
     * Global IP Health check type.
     */
    #[Api(optional: true)]
    public ?string $health_check_type;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?array $health_check_params = null,
        ?string $health_check_type = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $health_check_params && $obj['health_check_params'] = $health_check_params;
        null !== $health_check_type && $obj['health_check_type'] = $health_check_type;
        null !== $record_type && $obj['record_type'] = $record_type;

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
        $obj['health_check_params'] = $healthCheckParams;

        return $obj;
    }

    /**
     * Global IP Health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $obj = clone $this;
        $obj['health_check_type'] = $healthCheckType;

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
}
