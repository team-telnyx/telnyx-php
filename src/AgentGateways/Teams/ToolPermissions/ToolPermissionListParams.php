<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Teams\ToolPermissions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the MCP servers and APIs the team's keys may use, and the tools within each. `servers: []` means none. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\Teams\ToolPermissionsService::list()
 *
 * @phpstan-type ToolPermissionListParamsShape = array{instanceID: string}
 */
final class ToolPermissionListParams implements BaseModel
{
    /** @use SdkModel<ToolPermissionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `new ToolPermissionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolPermissionListParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolPermissionListParams)->withInstanceID(...)
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
     */
    public static function with(string $instanceID): self
    {
        $self = new self;

        $self['instanceID'] = $instanceID;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

        return $self;
    }
}
