<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayShownAuthShape from \Telnyx\AgentGateways\APIs\AgentGatewayShownAuth
 *
 * @phpstan-type AgentGatewayAPIShape = array{
 *   id: string,
 *   auth: AgentGatewayShownAuth|AgentGatewayShownAuthShape,
 *   baseURL: string|null,
 *   createdAt: \DateTimeInterface|null,
 *   forwardedHeaders: list<string>,
 *   name: string,
 *   openToEveryKey: bool,
 *   specURL: string,
 *   staticHeaders: array<string,string>,
 *   tools: list<string>,
 *   updatedAt: \DateTimeInterface|null,
 * }
 */
final class AgentGatewayAPI implements BaseModel
{
    /** @use SdkModel<AgentGatewayAPIShape> */
    use SdkModel;

    /**
     * Identifies the API.
     */
    #[Required]
    public string $id;

    /**
     * The server's outbound authentication method. Credentials are never returned.
     */
    #[Required]
    public AgentGatewayShownAuth $auth;

    /**
     * Where the gateway sends the API's requests. `null` takes the description's first `servers` entry.
     */
    #[Required('base_url')]
    public ?string $baseURL;

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
     * A name for the API, unique on the instance across MCP servers and APIs, regardless of case. Letters, digits, `_`, and `.`. The gateway prefixes the API's tools with it and a hyphen.
     */
    #[Required]
    public string $name;

    /**
     * `true` lets every key on the instance use the server, granted or not.
     */
    #[Required('open_to_every_key')]
    public bool $openToEveryKey;

    /**
     * The URL of the API's OpenAPI description.
     */
    #[Required('spec_url')]
    public string $specURL;

    /**
     * Headers sent on every request.
     *
     * @var array<string,string> $staticHeaders
     */
    #[Required('static_headers', map: 'string')]
    public array $staticHeaders;

    /**
     * The operations the API exposes as tools, by tool name. `[]` exposes every operation.
     *
     * @var list<string> $tools
     */
    #[Required(list: 'string')]
    public array $tools;

    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AgentGatewayAPI()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayAPI::with(
     *   id: ...,
     *   auth: ...,
     *   baseURL: ...,
     *   createdAt: ...,
     *   forwardedHeaders: ...,
     *   name: ...,
     *   openToEveryKey: ...,
     *   specURL: ...,
     *   staticHeaders: ...,
     *   tools: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayAPI)
     *   ->withID(...)
     *   ->withAuth(...)
     *   ->withBaseURL(...)
     *   ->withCreatedAt(...)
     *   ->withForwardedHeaders(...)
     *   ->withName(...)
     *   ->withOpenToEveryKey(...)
     *   ->withSpecURL(...)
     *   ->withStaticHeaders(...)
     *   ->withTools(...)
     *   ->withUpdatedAt(...)
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
     */
    public static function with(
        string $id,
        AgentGatewayShownAuth|array $auth,
        ?string $baseURL,
        ?\DateTimeInterface $createdAt,
        array $forwardedHeaders,
        string $name,
        string $specURL,
        array $staticHeaders,
        array $tools,
        ?\DateTimeInterface $updatedAt,
        bool $openToEveryKey = false,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['auth'] = $auth;
        $self['baseURL'] = $baseURL;
        $self['createdAt'] = $createdAt;
        $self['forwardedHeaders'] = $forwardedHeaders;
        $self['name'] = $name;
        $self['openToEveryKey'] = $openToEveryKey;
        $self['specURL'] = $specURL;
        $self['staticHeaders'] = $staticHeaders;
        $self['tools'] = $tools;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the API.
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

    /**
     * Where the gateway sends the API's requests. `null` takes the description's first `servers` entry.
     */
    public function withBaseURL(?string $baseURL): self
    {
        $self = clone $this;
        $self['baseURL'] = $baseURL;

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
     * The URL of the API's OpenAPI description.
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

    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
