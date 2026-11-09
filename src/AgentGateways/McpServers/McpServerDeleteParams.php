<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes an MCP server and returns it as it was. Its `id` stays in the tool permissions that name it until they are next set. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\McpServersService::delete()
 *
 * @phpstan-type McpServerDeleteParamsShape = array{instanceID: string}
 */
final class McpServerDeleteParams implements BaseModel
{
    /** @use SdkModel<McpServerDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * `new McpServerDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerDeleteParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerDeleteParams)->withInstanceID(...)
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
