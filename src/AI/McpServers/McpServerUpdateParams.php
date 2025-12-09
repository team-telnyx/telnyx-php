<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an existing MCP server.
 *
 * @see Telnyx\Services\AI\McpServersService::update()
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

    #[Optional]
    public ?string $id;

    /** @var list<string>|null $allowedTools */
    #[Optional('allowed_tools', list: 'string', nullable: true)]
    public ?array $allowedTools;

    #[Optional('api_key_ref', nullable: true)]
    public ?string $apiKeyRef;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $type;

    #[Optional]
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

        null !== $id && $obj['id'] = $id;
        null !== $allowedTools && $obj['allowedTools'] = $allowedTools;
        null !== $apiKeyRef && $obj['apiKeyRef'] = $apiKeyRef;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $name && $obj['name'] = $name;
        null !== $type && $obj['type'] = $type;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
}
