<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a Global IP health check.
 *
 * @see Telnyx\Services\GlobalIPHealthChecksService::create()
 *
 * @phpstan-type GlobalIPHealthCheckCreateParamsShape = array{
 *   globalIPID?: string,
 *   healthCheckParams?: array<string,mixed>,
 *   healthCheckType?: string,
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
        ?string $globalIPID = null,
        ?array $healthCheckParams = null,
        ?string $healthCheckType = null,
    ): self {
        $obj = new self;

        null !== $globalIPID && $obj['globalIPID'] = $globalIPID;
        null !== $healthCheckParams && $obj['healthCheckParams'] = $healthCheckParams;
        null !== $healthCheckType && $obj['healthCheckType'] = $healthCheckType;

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
