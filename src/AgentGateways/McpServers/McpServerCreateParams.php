<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\AgentGateways\McpServers\McpServerCreateParams\Transport;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Adds an MCP server. The instance serves its tools at `{gateway_url}/mcp`, each named with the server's `name` and a hyphen, to the keys granted the server and, with `open_to_every_key`, to every key. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\McpServersService::create()
 *
 * @phpstan-import-type AuthVariants from \Telnyx\AgentGateways\McpServers\McpServerCreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerCreateParams\Auth
 *
 * @phpstan-type McpServerCreateParamsShape = array{
 *   name: string,
 *   url: string,
 *   auth?: AuthShape|null,
 *   forwardedHeaders?: list<string>|null,
 *   openToEveryKey?: bool|null,
 *   staticHeaders?: array<string,string>|null,
 *   tools?: list<string>|null,
 *   transport?: null|Transport|value-of<Transport>,
 * }
 */
final class McpServerCreateParams implements BaseModel
{
    /** @use SdkModel<McpServerCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Up to 100 letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     */
    #[Required]
    public string $name;

    /**
     * The server's MCP endpoint, `http` or `https`.
     */
    #[Required]
    public string $url;

    /**
     * How the gateway authenticates to the server. Replaced whole on an update; `{"type": "none"}` removes the credential.
     *
     * @var AuthVariants|null $auth
     */
    #[Optional]
    public AgentGatewayNoAuth|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|AgentGatewayAwsSigV4Auth|null $auth;

    /**
     * Headers copied from the agent's request, by name.
     *
     * @var list<string>|null $forwardedHeaders
     */
    #[Optional('forwarded_headers', list: 'string')]
    public ?array $forwardedHeaders;

    /**
     * `true` lets every key on the instance use the server, granted or not.
     */
    #[Optional('open_to_every_key')]
    public ?bool $openToEveryKey;

    /**
     * Headers sent on every request.
     *
     * @var array<string,string>|null $staticHeaders
     */
    #[Optional('static_headers', map: 'string')]
    public ?array $staticHeaders;

    /**
     * The tools the server exposes to every key, by name. `[]` exposes every tool.
     *
     * @var list<string>|null $tools
     */
    #[Optional(list: 'string')]
    public ?array $tools;

    /**
     * `http` for Streamable HTTP, or `sse` for Server-Sent Events.
     *
     * @var value-of<Transport>|null $transport
     */
    #[Optional(enum: Transport::class)]
    public ?string $transport;

    /**
     * `new McpServerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerCreateParams::with(name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerCreateParams)->withName(...)->withURL(...)
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
     * @param AuthShape|null $auth
     * @param list<string>|null $forwardedHeaders
     * @param array<string,string>|null $staticHeaders
     * @param list<string>|null $tools
     * @param Transport|value-of<Transport>|null $transport
     */
    public static function with(
        string $name,
        string $url,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|AgentGatewayAwsSigV4Auth|null $auth = null,
        ?array $forwardedHeaders = null,
        ?bool $openToEveryKey = null,
        ?array $staticHeaders = null,
        ?array $tools = null,
        Transport|string|null $transport = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['url'] = $url;

        null !== $auth && $self['auth'] = $auth;
        null !== $forwardedHeaders && $self['forwardedHeaders'] = $forwardedHeaders;
        null !== $openToEveryKey && $self['openToEveryKey'] = $openToEveryKey;
        null !== $staticHeaders && $self['staticHeaders'] = $staticHeaders;
        null !== $tools && $self['tools'] = $tools;
        null !== $transport && $self['transport'] = $transport;

        return $self;
    }

    /**
     * A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Up to 100 letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The server's MCP endpoint, `http` or `https`.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * How the gateway authenticates to the server. Replaced whole on an update; `{"type": "none"}` removes the credential.
     *
     * @param AuthShape $auth
     */
    public function withAuth(
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|AgentGatewayAwsSigV4Auth $auth,
    ): self {
        $self = clone $this;
        $self['auth'] = $auth;

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
}
