<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayMcpServerShape from \Telnyx\AgentGateways\McpServers\AgentGatewayMcpServer
 *
 * @phpstan-type AgentGatewayMcpServerResponseShape = array{
 *   data: AgentGatewayMcpServer|AgentGatewayMcpServerShape
 * }
 */
final class AgentGatewayMcpServerResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayMcpServerResponseShape> */
    use SdkModel;

    #[Required]
    public AgentGatewayMcpServer $data;

    /**
     * `new AgentGatewayMcpServerResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayMcpServerResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayMcpServerResponse)->withData(...)
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
     * @param AgentGatewayMcpServer|AgentGatewayMcpServerShape $data
     */
    public static function with(AgentGatewayMcpServer|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AgentGatewayMcpServer|AgentGatewayMcpServerShape $data
     */
    public function withData(AgentGatewayMcpServer|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
