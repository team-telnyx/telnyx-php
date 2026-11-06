<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys\ToolPermissions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayToolPermissionsShape from \Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissions
 *
 * @phpstan-type AgentGatewayToolPermissionsResponseShape = array{
 *   data: AgentGatewayToolPermissions|AgentGatewayToolPermissionsShape
 * }
 */
final class AgentGatewayToolPermissionsResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayToolPermissionsResponseShape> */
    use SdkModel;

    #[Required]
    public AgentGatewayToolPermissions $data;

    /**
     * `new AgentGatewayToolPermissionsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayToolPermissionsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayToolPermissionsResponse)->withData(...)
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
     * @param AgentGatewayToolPermissions|AgentGatewayToolPermissionsShape $data
     */
    public static function with(AgentGatewayToolPermissions|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AgentGatewayToolPermissions|AgentGatewayToolPermissionsShape $data
     */
    public function withData(AgentGatewayToolPermissions|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
