<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Endpoint to update a canary deploy configuration for an assistant.
 *
 * Updates the existing canary deploy configuration with new version IDs and percentages.
 *   All old versions and percentages are replaces by new ones from this request.
 *
 * @see Telnyx\AI\Assistants\CanaryDeploys->update
 *
 * @phpstan-type canary_deploy_update_params = array{versions: list<VersionConfig>}
 */
final class CanaryDeployUpdateParams implements BaseModel
{
    /** @use SdkModel<canary_deploy_update_params> */
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
     * `new CanaryDeployUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeployUpdateParams::with(versions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CanaryDeployUpdateParams)->withVersions(...)
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
