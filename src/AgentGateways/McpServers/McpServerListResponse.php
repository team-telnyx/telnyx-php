<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayMcpServerShape from \Telnyx\AgentGateways\McpServers\AgentGatewayMcpServer
 *
 * @phpstan-type McpServerListResponseShape = array{
 *   data: list<AgentGatewayMcpServer|AgentGatewayMcpServerShape>
 * }
 */
final class McpServerListResponse implements BaseModel
{
    /** @use SdkModel<McpServerListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayMcpServer> $data */
    #[Required(list: AgentGatewayMcpServer::class)]
    public array $data;

    /**
     * `new McpServerListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerListResponse)->withData(...)
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
     * @param list<AgentGatewayMcpServer|AgentGatewayMcpServerShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayMcpServer|AgentGatewayMcpServerShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
