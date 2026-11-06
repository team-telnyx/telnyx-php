<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\AgentGateways\APIs\AgentGatewayShownAuth;
use Telnyx\AgentGateways\McpServers\AgentGatewayMcpServer\Transport;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayShownAuthShape from \Telnyx\AgentGateways\APIs\AgentGatewayShownAuth
 *
 * @phpstan-type AgentGatewayMcpServerShape = array{
 *   id: string,
 *   auth: AgentGatewayShownAuth|AgentGatewayShownAuthShape,
 *   createdAt: \DateTimeInterface|null,
 *   forwardedHeaders: list<string>,
 *   name: string,
 *   openToEveryKey: bool,
 *   staticHeaders: array<string,string>,
 *   tools: list<string>,
 *   transport: Transport|value-of<Transport>,
 *   updatedAt: \DateTimeInterface|null,
 *   url: string,
 * }
 */
final class AgentGatewayMcpServer implements BaseModel
{
    /** @use SdkModel<AgentGatewayMcpServerShape> */
    use SdkModel;

    /**
     * Identifies the server.
     */
    #[Required]
    public string $id;

    /**
     * The server's outbound authentication method. Credentials are never returned.
     */
    #[Required]
    public AgentGatewayShownAuth $auth;

    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Headers copied from the agent's request, by name.
     *
     * @var list<string> $forwardedHeaders
     */
    #[Required('forwarded_headers', list: 'string')]
    public array $forwardedHeaders;

    /**
     * A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     */
    #[Required]
    public string $name;

    /**
     * `true` lets every key on the instance use the server, granted or not.
     */
    #[Required('open_to_every_key')]
    public bool $openToEveryKey;

    /**
     * Headers sent on every request.
     *
     * @var array<string,string> $staticHeaders
     */
    #[Required('static_headers', map: 'string')]
    public array $staticHeaders;

    /**
     * The tools the server exposes to every key, by name. `[]` exposes every tool.
     *
     * @var list<string> $tools
     */
    #[Required(list: 'string')]
    public array $tools;

    /**
     * `http` for Streamable HTTP, or `sse` for Server-Sent Events.
     *
     * @var value-of<Transport> $transport
     */
    #[Required(enum: Transport::class)]
    public string $transport;

    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The server's MCP endpoint.
     */
    #[Required]
    public string $url;

    /**
     * `new AgentGatewayMcpServer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayMcpServer::with(
     *   id: ...,
     *   auth: ...,
     *   createdAt: ...,
     *   forwardedHeaders: ...,
     *   name: ...,
     *   openToEveryKey: ...,
     *   staticHeaders: ...,
     *   tools: ...,
     *   transport: ...,
     *   updatedAt: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayMcpServer)
     *   ->withID(...)
     *   ->withAuth(...)
     *   ->withCreatedAt(...)
     *   ->withForwardedHeaders(...)
     *   ->withName(...)
     *   ->withOpenToEveryKey(...)
     *   ->withStaticHeaders(...)
     *   ->withTools(...)
     *   ->withTransport(...)
     *   ->withUpdatedAt(...)
     *   ->withURL(...)
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
     * @param AgentGatewayShownAuth|AgentGatewayShownAuthShape $auth
     * @param list<string> $forwardedHeaders
     * @param array<string,string> $staticHeaders
     * @param list<string> $tools
     * @param Transport|value-of<Transport> $transport
     */
    public static function with(
        string $id,
        AgentGatewayShownAuth|array $auth,
        ?\DateTimeInterface $createdAt,
        array $forwardedHeaders,
        string $name,
        array $staticHeaders,
        array $tools,
        Transport|string $transport,
        ?\DateTimeInterface $updatedAt,
        string $url,
        bool $openToEveryKey = false,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['auth'] = $auth;
        $self['createdAt'] = $createdAt;
        $self['forwardedHeaders'] = $forwardedHeaders;
        $self['name'] = $name;
        $self['openToEveryKey'] = $openToEveryKey;
        $self['staticHeaders'] = $staticHeaders;
        $self['tools'] = $tools;
        $self['transport'] = $transport;
        $self['updatedAt'] = $updatedAt;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Identifies the server.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The server's outbound authentication method. Credentials are never returned.
     *
     * @param AgentGatewayShownAuth|AgentGatewayShownAuthShape $auth
     */
    public function withAuth(AgentGatewayShownAuth|array $auth): self
    {
        $self = clone $this;
        $self['auth'] = $auth;

        return $self;
    }

    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Headers copied from the agent's request, by name.
     *
     * @param list<string> $forwardedHeaders
     */
    public function withForwardedHeaders(array $forwardedHeaders): self
    {
        $self = clone $this;
        $self['forwardedHeaders'] = $forwardedHeaders;

        return $self;
    }

    /**
     * A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * `true` lets every key on the instance use the server, granted or not.
     */
    public function withOpenToEveryKey(bool $openToEveryKey): self
    {
        $self = clone $this;
        $self['openToEveryKey'] = $openToEveryKey;

        return $self;
    }

    /**
     * Headers sent on every request.
     *
     * @param array<string,string> $staticHeaders
     */
    public function withStaticHeaders(array $staticHeaders): self
    {
        $self = clone $this;
        $self['staticHeaders'] = $staticHeaders;

        return $self;
    }

    /**
     * The tools the server exposes to every key, by name. `[]` exposes every tool.
     *
     * @param list<string> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }

    /**
     * `http` for Streamable HTTP, or `sse` for Server-Sent Events.
     *
     * @param Transport|value-of<Transport> $transport
     */
    public function withTransport(Transport|string $transport): self
    {
        $self = clone $this;
        $self['transport'] = $transport;

        return $self;
    }

    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The server's MCP endpoint.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
