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
 * Changes an API's settings. A field left out stays as it is, `"base_url": null` clears the base URL, and `auth` is replaced whole. The instance must be `ready`; otherwise the request answers `409`.
 *
 * @see Telnyx\Services\AgentGateways\APIsService::update()
 *
 * @phpstan-import-type AuthVariants from \Telnyx\AgentGateways\APIs\APIUpdateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APIUpdateParams\Auth
 *
 * @phpstan-type APIUpdateParamsShape = array{
 *   instanceID: string,
 *   auth?: AuthShape|null,
 *   baseURL?: string|null,
 *   forwardedHeaders?: list<string>|null,
 *   name?: string|null,
 *   openToEveryKey?: bool|null,
 *   specURL?: string|null,
 *   staticHeaders?: array<string,string>|null,
 *   tools?: list<string>|null,
 * }
 */
final class APIUpdateParams implements BaseModel
{
    /** @use SdkModel<APIUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

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
     * A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
     */
    #[Optional]
    public ?string $name;

    /**
     * `true` lets every key on the instance use the server, granted or not.
     */
    #[Optional('open_to_every_key')]
    public ?bool $openToEveryKey;

    /**
     * The URL of the API's OpenAPI description: OpenAPI 3.0, OpenAPI 3.1, or Swagger 2.0.
     */
    #[Optional('spec_url')]
    public ?string $specURL;

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
     * `new APIUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIUpdateParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIUpdateParams)->withInstanceID(...)
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
        string $instanceID,
        string|Omitted|null $baseURL = Omitted::VALUE,
        AgentGatewayNoAuth|array|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth|null $auth = null,
        ?array $forwardedHeaders = null,
        ?string $name = null,
        ?bool $openToEveryKey = null,
        ?string $specURL = null,
        ?array $staticHeaders = null,
        ?array $tools = null,
    ): self {
        $self = new self;

        $self['instanceID'] = $instanceID;

        null !== $auth && $self['auth'] = $auth;
        Omitted::VALUE !== $baseURL && $self['baseURL'] = $baseURL;
        null !== $forwardedHeaders && $self['forwardedHeaders'] = $forwardedHeaders;
        null !== $name && $self['name'] = $name;
        null !== $openToEveryKey && $self['openToEveryKey'] = $openToEveryKey;
        null !== $specURL && $self['specURL'] = $specURL;
        null !== $staticHeaders && $self['staticHeaders'] = $staticHeaders;
        null !== $tools && $self['tools'] = $tools;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

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
     * A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
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
     * The URL of the API's OpenAPI description: OpenAPI 3.0, OpenAPI 3.1, or Swagger 2.0.
     */
    public function withSpecURL(string $specURL): self
    {
        $self = clone $this;
        $self['specURL'] = $specURL;

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
