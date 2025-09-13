<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type unnamed_type_with_intersection_parent4 = array{
 *   globalIPID?: string,
 *   healthCheckParams?: array<string, mixed>,
 *   healthCheckType?: string,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent4> */
    use SdkModel;

    /**
     * Global IP ID.
     */
    #[Api('global_ip_id', optional: true)]
    public ?string $globalIPID;

    /**
     * A Global IP health check params.
     *
     * @var array<string, mixed>|null $healthCheckParams
     */
    #[Api('health_check_params', map: 'mixed', optional: true)]
    public ?array $healthCheckParams;

    /**
     * The Global IP health check type.
     */
    #[Api('health_check_type', optional: true)]
    public ?string $healthCheckType;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
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
     * @param array<string, mixed> $healthCheckParams
     */
    public static function with(
        ?string $globalIPID = null,
        ?array $healthCheckParams = null,
        ?string $healthCheckType = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $globalIPID && $obj->globalIPID = $globalIPID;
        null !== $healthCheckParams && $obj->healthCheckParams = $healthCheckParams;
        null !== $healthCheckType && $obj->healthCheckType = $healthCheckType;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIPID(string $globalIPID): self
    {
        $obj = clone $this;
        $obj->globalIPID = $globalIPID;

        return $obj;
    }

    /**
     * A Global IP health check params.
     *
     * @param array<string, mixed> $healthCheckParams
     */
    public function withHealthCheckParams(array $healthCheckParams): self
    {
        $obj = clone $this;
        $obj->healthCheckParams = $healthCheckParams;

        return $obj;
    }

    /**
     * The Global IP health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $obj = clone $this;
        $obj->healthCheckType = $healthCheckType;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
