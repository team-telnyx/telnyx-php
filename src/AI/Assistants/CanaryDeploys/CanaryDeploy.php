<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Request model for creating or updating canary deploys.
 *
 * @phpstan-type CanaryDeployShape = array{versions: list<VersionConfig>}
 */
final class CanaryDeploy implements BaseModel
{
    /** @use SdkModel<CanaryDeployShape> */
    use SdkModel;

    /**
     * List of version configurations.
     *
     * @var list<VersionConfig> $versions
     */
    #[Api(list: VersionConfig::class)]
    public array $versions;

    /**
     * `new CanaryDeploy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeploy::with(versions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CanaryDeploy)->withVersions(...)
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
