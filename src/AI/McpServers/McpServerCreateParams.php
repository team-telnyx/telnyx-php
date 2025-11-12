<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Api;
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
 *   allowed_tools?: list<string>|null,
 *   api_key_ref?: string|null,
 * }
 */
final class McpServerCreateParams implements BaseModel
{
    /** @use SdkModel<McpServerCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    #[Api]
    public string $type;

    #[Api]
    public string $url;

    /** @var list<string>|null $allowed_tools */
    #[Api(list: 'string', nullable: true, optional: true)]
    public ?array $allowed_tools;

    #[Api(nullable: true, optional: true)]
    public ?string $api_key_ref;

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
     * @param list<string>|null $allowed_tools
     */
    public static function with(
        string $name,
        string $type,
        string $url,
        ?array $allowed_tools = null,
        ?string $api_key_ref = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->type = $type;
        $obj->url = $url;

        null !== $allowed_tools && $obj->allowed_tools = $allowed_tools;
        null !== $api_key_ref && $obj->api_key_ref = $api_key_ref;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * @param list<string>|null $allowedTools
     */
    public function withAllowedTools(?array $allowedTools): self
    {
        $obj = clone $this;
        $obj->allowed_tools = $allowedTools;

        return $obj;
    }

    public function withAPIKeyRef(?string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->api_key_ref = $apiKeyRef;

        return $obj;
    }
}
