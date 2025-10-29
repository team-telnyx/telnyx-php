<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an existing MCP server.
 *
 * @see Telnyx\AI\McpServers->update
 *
 * @phpstan-type McpServerUpdateParamsShape = array{
 *   id?: string,
 *   allowedTools?: list<string>|null,
 *   apiKeyRef?: string|null,
 *   createdAt?: \DateTimeInterface,
 *   name?: string,
 *   type?: string,
 *   url?: string,
 * }
 */
final class McpServerUpdateParams implements BaseModel
{
    /** @use SdkModel<McpServerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $id;

    /** @var list<string>|null $allowedTools */
    #[Api('allowed_tools', list: 'string', nullable: true, optional: true)]
    public ?array $allowedTools;

    #[Api('api_key_ref', nullable: true, optional: true)]
    public ?string $apiKeyRef;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?string $url;

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
        ?string $id = null,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $type = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $allowedTools && $obj->allowedTools = $allowedTools;
        null !== $apiKeyRef && $obj->apiKeyRef = $apiKeyRef;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $type && $obj->type = $type;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<string>|null $allowedTools
     */
    public function withAllowedTools(?array $allowedTools): self
    {
        $obj = clone $this;
        $obj->allowedTools = $allowedTools;

        return $obj;
    }

    public function withAPIKeyRef(?string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->apiKeyRef = $apiKeyRef;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
}
