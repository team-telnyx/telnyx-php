<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Reference to an MCP server attached to an assistant. Create and manage MCP servers with the `/ai/mcp_servers` endpoints, then attach them to assistants by ID.
 *
 * @phpstan-type McpServerShape = array{
 *   id: string, allowedTools?: list<string>|null
 * }
 */
final class McpServer implements BaseModel
{
    /** @use SdkModel<McpServerShape> */
    use SdkModel;

    /**
     * ID of the MCP server to attach. This must be the `id` of an MCP server returned by the `/ai/mcp_servers` endpoints.
     */
    #[Required]
    public string $id;

    /**
     * Optional per-assistant allowlist of MCP tool names. When omitted, the assistant uses the MCP server's configured `allowed_tools`.
     *
     * @var list<string>|null $allowedTools
     */
    #[Optional('allowed_tools', list: 'string')]
    public ?array $allowedTools;

    /**
     * `new McpServer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServer::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServer)->withID(...)
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
     * @param list<string>|null $allowedTools
     */
    public static function with(string $id, ?array $allowedTools = null): self
    {
        $self = new self;

        $self['id'] = $id;

        null !== $allowedTools && $self['allowedTools'] = $allowedTools;

        return $self;
    }

    /**
     * ID of the MCP server to attach. This must be the `id` of an MCP server returned by the `/ai/mcp_servers` endpoints.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Optional per-assistant allowlist of MCP tool names. When omitted, the assistant uses the MCP server's configured `allowed_tools`.
     *
     * @param list<string> $allowedTools
     */
    public function withAllowedTools(array $allowedTools): self
    {
        $self = clone $this;
        $self['allowedTools'] = $allowedTools;

        return $self;
    }
}
