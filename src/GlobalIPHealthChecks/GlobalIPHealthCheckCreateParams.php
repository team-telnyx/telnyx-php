<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthChecks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GlobalIPHealthCheckCreateParams); // set properties as needed
 * $client->globalIPHealthChecks->create(...$params->toArray());
 * ```
 * Create a Global IP health check.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->globalIPHealthChecks->create(...$params->toArray());`
 *
 * @see Telnyx\GlobalIPHealthChecks->create
 *
 * @phpstan-type global_ip_health_check_create_params = array{
 *   globalIPID?: string,
 *   healthCheckParams?: array<string, mixed>,
 *   healthCheckType?: string,
 * }
 */
final class GlobalIPHealthCheckCreateParams implements BaseModel
{
    /** @use SdkModel<global_ip_health_check_create_params> */
    use SdkModel;
    use SdkParams;

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
    ): self {
        $obj = new self;

        null !== $globalIPID && $obj->globalIPID = $globalIPID;
        null !== $healthCheckParams && $obj->healthCheckParams = $healthCheckParams;
        null !== $healthCheckType && $obj->healthCheckType = $healthCheckType;

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
}
