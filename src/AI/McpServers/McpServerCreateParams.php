<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new MCP server.
 *
 * @see Telnyx\Services\AI\McpServersService::create()
 *
 * @phpstan-type McpServerCreateParamsShape = array{
 *   name: string,
 *   type: string,
 *   url: string,
 *   allowedTools?: list<string>|null,
 *   apiKeyRef?: string|null,
 * }
 */
final class McpServerCreateParams implements BaseModel
{
    /** @use SdkModel<McpServerCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    #[Required]
    public string $type;

    #[Required]
    public string $url;

    /** @var list<string>|null $allowedTools */
    #[Optional('allowed_tools', list: 'string', nullable: true)]
    public ?array $allowedTools;

    #[Optional('api_key_ref', nullable: true)]
    public ?string $apiKeyRef;

    /**
     * `new McpServerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerCreateParams::with(name: ..., type: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerCreateParams)->withName(...)->withType(...)->withURL(...)
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
    public static function with(
        string $name,
        string $type,
        string $url,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;
        $obj['type'] = $type;
        $obj['url'] = $url;

        null !== $allowedTools && $obj['allowedTools'] = $allowedTools;
        null !== $apiKeyRef && $obj['apiKeyRef'] = $apiKeyRef;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    /**
     * @param list<string>|null $allowedTools
     */
    public function withAllowedTools(?array $allowedTools): self
    {
        $obj = clone $this;
        $obj['allowedTools'] = $allowedTools;

        return $obj;
    }

    public function withAPIKeyRef(?string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj['apiKeyRef'] = $apiKeyRef;

        return $obj;
    }
}
