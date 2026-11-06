<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Adds a REST API by its OpenAPI description. Each operation becomes a tool at `{gateway_url}/mcp`, named with the API's `name`, a hyphen, and the lowercased `operationId`. A description the gateway cannot fetch yields an API with no tools. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\APIsService::create()
 *
 * @phpstan-import-type AuthVariants from \Telnyx\AgentGateways\APIs\APICreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APICreateParams\Auth
 *
 * @phpstan-type APICreateParamsShape = array{
 *   name: string,
 *   specURL: string,
 *   auth?: AuthShape|null,
 *   baseURL?: string|null,
 *   forwardedHeaders?: list<string>|null,
 *   openToEveryKey?: bool|null,
 *   staticHeaders?: array<string,string>|null,
 *   tools?: list<string>|null,
 * }
 */
final class APICreateParams implements BaseModel
{
    /** @use SdkModel<APICreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Up to 100 letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
     */
    #[Required]
    public string $name;

    /**
     * The URL of the API's OpenAPI description: OpenAPI 3.0, OpenAPI 3.1, or Swagger 2.0.
     */
    #[Required('spec_url')]
    public string $specURL;

    /**
     * How the gateway authenticates to the API. AWS Signature Version 4 is for MCP servers only. Replaced whole on an update.
     *
     * @var AuthVariants|null $auth
     */
    #[Optional]
    public AgentGatewayNoAuth|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|null $auth;

    /**
     * Where the gateway sends the API's requests. Without it, the gateway takes the description's first `servers` entry.
     */
    #[Optional('base_url', nullable: true)]
    public ?string $baseURL;

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
     * The operations the API exposes as tools, by tool name. `[]` exposes every operation.
     *
     * @var list<string>|null $tools
     */
    #[Optional(list: 'string')]
    public ?array $tools;

    /**
     * `new APICreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APICreateParams::with(name: ..., specURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APICreateParams)->withName(...)->withSpecURL(...)
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
     */
    public static function with(
        string $name,
        string $specURL,
        string|Omitted|null $baseURL = Omitted::VALUE,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|null $auth = null,
        ?array $forwardedHeaders = null,
        ?bool $openToEveryKey = null,
        ?array $staticHeaders = null,
        ?array $tools = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['specURL'] = $specURL;

        null !== $auth && $self['auth'] = $auth;
        Omitted::VALUE !== $baseURL && $self['baseURL'] = $baseURL;
        null !== $forwardedHeaders && $self['forwardedHeaders'] = $forwardedHeaders;
        null !== $openToEveryKey && $self['openToEveryKey'] = $openToEveryKey;
        null !== $staticHeaders && $self['staticHeaders'] = $staticHeaders;
        null !== $tools && $self['tools'] = $tools;

        return $self;
    }

    /**
     * A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Up to 100 letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The URL of the API's OpenAPI description: OpenAPI 3.0, OpenAPI 3.1, or Swagger 2.0.
     */
    public function withSpecURL(string $specURL): self
    {
        $self = clone $this;
        $self['specURL'] = $specURL;

        return $self;
    }

    /**
     * How the gateway authenticates to the API. AWS Signature Version 4 is for MCP servers only. Replaced whole on an update.
     *
     * @param AuthShape $auth
     */
    public function withAuth(
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth $auth,
    ): self {
        $self = clone $this;
        $self['auth'] = $auth;

        return $self;
    }

    /**
     * Where the gateway sends the API's requests. Without it, the gateway takes the description's first `servers` entry.
     */
    public function withBaseURL(?string $baseURL): self
    {
        $self = clone $this;
        $self['baseURL'] = $baseURL;

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
     * The operations the API exposes as tools, by tool name. `[]` exposes every operation.
     *
     * @param list<string> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }
}
