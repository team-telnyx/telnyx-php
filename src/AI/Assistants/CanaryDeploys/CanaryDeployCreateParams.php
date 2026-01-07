<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Endpoint to create a canary deploy configuration for an assistant.
 *
 * Creates a new canary deploy configuration with multiple version IDs and their traffic
 * percentages for A/B testing or gradual rollouts of assistant versions.
 *
 * @see Telnyx\Services\AI\Assistants\CanaryDeploysService::create()
 *
 * @phpstan-import-type VersionConfigShape from \Telnyx\AI\Assistants\CanaryDeploys\VersionConfig
 *
 * @phpstan-type CanaryDeployCreateParamsShape = array{
 *   versions: list<VersionConfig|VersionConfigShape>
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
    #[Required(list: VersionConfig::class)]
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
     * @param list<VersionConfig|VersionConfigShape> $versions
     */
    public static function with(array $versions): self
    {
        $self = new self;

        $self['versions'] = $versions;

        return $self;
    }

    /**
     * List of version configurations.
     *
     * @param list<VersionConfig|VersionConfigShape> $versions
     */
    public function withVersions(array $versions): self
    {
        $self = clone $this;
        $self['versions'] = $versions;

        return $self;
    }
}
