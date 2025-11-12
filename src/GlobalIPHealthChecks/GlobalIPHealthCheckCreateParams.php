<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a Global IP health check.
 *
 * @see Telnyx\GlobalIPHealthChecksService::create()
 *
 * @phpstan-type GlobalIPHealthCheckCreateParamsShape = array{
 *   global_ip_id?: string,
 *   health_check_params?: array<string,mixed>,
 *   health_check_type?: string,
 * }
 */
final class GlobalIPHealthCheckCreateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPHealthCheckCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Global IP ID.
     */
    #[Api(optional: true)]
    public ?string $global_ip_id;

    /**
     * A Global IP health check params.
     *
     * @var array<string,mixed>|null $health_check_params
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $health_check_params;

    /**
     * The Global IP health check type.
     */
    #[Api(optional: true)]
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
        ?string $global_ip_id = null,
        ?array $health_check_params = null,
        ?string $health_check_type = null,
    ): self {
        $obj = new self;

        null !== $global_ip_id && $obj->global_ip_id = $global_ip_id;
        null !== $health_check_params && $obj->health_check_params = $health_check_params;
        null !== $health_check_type && $obj->health_check_type = $health_check_type;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIPID(string $globalIPID): self
    {
        $obj = clone $this;
        $obj->global_ip_id = $globalIPID;

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
        $obj->health_check_params = $healthCheckParams;

        return $obj;
    }

    /**
     * The Global IP health check type.
     */
    public function withHealthCheckType(string $healthCheckType): self
    {
        $obj = clone $this;
        $obj->health_check_type = $healthCheckType;

        return $obj;
    }
}
