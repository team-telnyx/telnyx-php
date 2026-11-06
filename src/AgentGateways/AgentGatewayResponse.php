<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayShape from \Telnyx\AgentGateways\AgentGateway
 *
 * @phpstan-type AgentGatewayResponseShape = array{
 *   data: AgentGateway|AgentGatewayShape
 * }
 */
final class AgentGatewayResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayResponseShape> */
    use SdkModel;

    /**
     * An Agent Gateway instance on a WireGuard Interface.
     */
    #[Required]
    public AgentGateway $data;

    /**
     * `new AgentGatewayResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayResponse)->withData(...)
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
     * @param AgentGateway|AgentGatewayShape $data
     */
    public static function with(AgentGateway|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * An Agent Gateway instance on a WireGuard Interface.
     *
     * @param AgentGateway|AgentGatewayShape $data
     */
    public function withData(AgentGateway|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
