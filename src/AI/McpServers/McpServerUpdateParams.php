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
 *   id?: string|null,
 *   allowedTools?: list<string>|null,
 *   apiKeyRef?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   type?: string|null,
 *   url?: string|null,
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $allowedTools && $self['allowedTools'] = $allowedTools;
        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<string>|null $allowedTools
     */
    public function withAllowedTools(?array $allowedTools): self
    {
        $self = clone $this;
        $self['allowedTools'] = $allowedTools;

        return $self;
    }

    public function withAPIKeyRef(?string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
