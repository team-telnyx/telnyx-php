<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys\ToolPermissions;

use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissions\Server;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ServerShape from \Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissions\Server
 *
 * @phpstan-type AgentGatewayToolPermissionsShape = array{
 *   servers: list<Server|ServerShape>
 * }
 */
final class AgentGatewayToolPermissions implements BaseModel
{
    /** @use SdkModel<AgentGatewayToolPermissionsShape> */
    use SdkModel;

    /**
     * The servers granted, each with its tools. `[]` grants none.
     *
     * @var list<Server> $servers
     */
    #[Required(list: Server::class)]
    public array $servers;

    /**
     * `new AgentGatewayToolPermissions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayToolPermissions::with(servers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayToolPermissions)->withServers(...)
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
    public static function with(array $servers): self
    {
        $self = new self;

        $self['servers'] = $servers;

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
