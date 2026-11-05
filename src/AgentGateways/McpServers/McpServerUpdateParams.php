<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Transport;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Changes an MCP server's settings. A field left out stays as it is. `auth` is replaced whole, `tools: []` exposes every tool, and `static_headers: {}` clears the headers. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\McpServersService::update()
 *
 * @phpstan-import-type AuthVariants from \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\McpServers\McpServerUpdateParams\Auth
 *
 * @phpstan-type McpServerUpdateParamsShape = array{
 *   instanceID: string,
 *   auth?: AuthShape|null,
 *   forwardedHeaders?: list<string>|null,
 *   name?: string|null,
 *   openToEveryKey?: bool|null,
 *   staticHeaders?: array<string,string>|null,
 *   tools?: list<string>|null,
 *   transport?: null|Transport|value-of<Transport>,
 *   url?: string|null,
 * }
 */
final class McpServerUpdateParams implements BaseModel
{
    /** @use SdkModel<McpServerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

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
     * A name for the server, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the server's tools with it and a hyphen.
     */
    #[Optional]
    public ?string $name;

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
     * The server's MCP endpoint, `http` or `https`.
     */
    #[Optional]
    public ?string $url;

    /**
     * `new McpServerUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerUpdateParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerUpdateParams)->withInstanceID(...)
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
        string $instanceID,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|AgentGatewayAwsSigV4Auth|null $auth = null,
        ?array $forwardedHeaders = null,
        ?string $name = null,
        ?bool $openToEveryKey = null,
        ?array $staticHeaders = null,
        ?array $tools = null,
        Transport|string|null $transport = null,
        ?string $url = null,
    ): self {
        $self = new self;

        $self['instanceID'] = $instanceID;

        null !== $auth && $self['auth'] = $auth;
        null !== $forwardedHeaders && $self['forwardedHeaders'] = $forwardedHeaders;
        null !== $name && $self['name'] = $name;
        null !== $openToEveryKey && $self['openToEveryKey'] = $openToEveryKey;
        null !== $staticHeaders && $self['staticHeaders'] = $staticHeaders;
        null !== $tools && $self['tools'] = $tools;
        null !== $transport && $self['transport'] = $transport;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

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

    /**
     * The server's MCP endpoint, `http` or `https`.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
