<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Endpoint to create a canary deploy configuration for an assistant.
 *
 * Creates a new canary deploy configuration with multiple version IDs and their traffic
 * percentages for A/B testing or gradual rollouts of assistant versions.
 *
 * @see Telnyx\STAINLESS_FIXME_AI\STAINLESS_FIXME_Assistants\CanaryDeploysService::create()
 *
 * @phpstan-type CanaryDeployCreateParamsShape = array{
 *   versions: list<VersionConfig>
 * }
 */
final class CanaryDeployCreateParams implements BaseModel
{
    /** @use SdkModel<CanaryDeployCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of version configurations.
     *
     * @var list<VersionConfig> $versions
     */
    #[Api(list: VersionConfig::class)]
    public array $versions;

    /**
     * `new CanaryDeployCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeployCreateParams::with(versions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CanaryDeployCreateParams)->withVersions(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VersionConfig> $versions
     */
    public static function with(array $versions): self
    {
        $obj = new self;

        $obj->versions = $versions;

        return $obj;
    }

    /**
     * List of version configurations.
     *
     * @param list<VersionConfig> $versions
     */
    public function withVersions(array $versions): self
    {
        $obj = clone $this;
        $obj->versions = $versions;

        return $obj;
    }
}
