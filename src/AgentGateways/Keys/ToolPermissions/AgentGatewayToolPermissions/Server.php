<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ServerShape = array{id: string, tools?: list<string>|null}
 */
final class Server implements BaseModel
{
    /** @use SdkModel<ServerShape> */
    use SdkModel;

    /**
     * An MCP server's or API's `id` on the instance.
     */
    #[Required]
    public string $id;

    /**
     * The tools the grant covers, by name without the server prefix. `[]` covers every tool the server exposes.
     *
     * @var list<string>|null $tools
     */
    #[Optional(list: 'string')]
    public ?array $tools;

    /**
     * `new Server()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Server::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Server)->withID(...)
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
     * @param list<string>|null $tools
     */
    public static function with(string $id, ?array $tools = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $tools && $self['tools'] = $tools;

        return $self;
    }

    /**
     * An MCP server's or API's `id` on the instance.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The tools the grant covers, by name without the server prefix. `[]` covers every tool the server exposes.
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
