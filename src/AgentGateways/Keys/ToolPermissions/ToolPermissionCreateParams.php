<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys\ToolPermissions;

use Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Replaces the grant whole and returns it. Every server must be one of the instance's MCP servers or APIs, named once. A key reaches the servers granted to it or to its team, and the servers open to every key; when both grant, only the servers in both. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\Keys\ToolPermissionsService::create()
 *
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Keys\ToolPermissions\ToolPermissionCreateParams\Server
 *
 * @phpstan-type ToolPermissionCreateParamsShape = array{
 *   instanceID: string, servers: list<Server|ServerShape>
 * }
 */
final class ToolPermissionCreateParams implements BaseModel
{
    /** @use SdkModel<ToolPermissionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

    /**
     * The servers granted, each with its tools. `[]` grants none.
     *
     * @var list<Server> $servers
     */
    #[Required(list: Server::class)]
    public array $servers;

    /**
     * `new ToolPermissionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolPermissionCreateParams::with(instanceID: ..., servers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolPermissionCreateParams)->withInstanceID(...)->withServers(...)
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
     * @param list<Server|ServerShape> $servers
     */
    public static function with(string $instanceID, array $servers): self
    {
        $self = new self;

        $self['instanceID'] = $instanceID;
        $self['servers'] = $servers;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

        return $self;
    }

    /**
     * The servers granted, each with its tools. `[]` grants none.
     *
     * @param list<Server|ServerShape> $servers
     */
    public function withServers(array $servers): self
    {
        $self = clone $this;
        $self['servers'] = $servers;

        return $self;
    }
}
