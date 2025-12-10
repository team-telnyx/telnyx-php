<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type McpServerListResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   type: string,
 *   url: string,
 *   allowedTools?: list<string>|null,
 *   apiKeyRef?: string|null,
 * }
 */
final class McpServerListResponse implements BaseModel
{
    /** @use SdkModel<McpServerListResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

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
     * `new McpServerListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerListResponse::with(
     *   id: ..., createdAt: ..., name: ..., type: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerListResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withType(...)
     *   ->withURL(...)
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
        string $id,
        \DateTimeInterface $createdAt,
        string $name,
        string $type,
        string $url,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['type'] = $type;
        $self['url'] = $url;

        null !== $allowedTools && $self['allowedTools'] = $allowedTools;
        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
}
