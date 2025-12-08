<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type McpServerNewResponseShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   name: string,
 *   type: string,
 *   url: string,
 *   allowed_tools?: list<string>|null,
 *   api_key_ref?: string|null,
 * }
 */
final class McpServerNewResponse implements BaseModel
{
    /** @use SdkModel<McpServerNewResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $created_at;

    #[Required]
    public string $name;

    #[Required]
    public string $type;

    #[Required]
    public string $url;

    /** @var list<string>|null $allowed_tools */
    #[Optional(list: 'string', nullable: true)]
    public ?array $allowed_tools;

    #[Optional(nullable: true)]
    public ?string $api_key_ref;

    /**
     * `new McpServerNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerNewResponse::with(
     *   id: ..., created_at: ..., name: ..., type: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerNewResponse)
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
     * @param list<string>|null $allowed_tools
     */
    public static function with(
        string $id,
        \DateTimeInterface $created_at,
        string $name,
        string $type,
        string $url,
        ?array $allowed_tools = null,
        ?string $api_key_ref = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['name'] = $name;
        $obj['type'] = $type;
        $obj['url'] = $url;

        null !== $allowed_tools && $obj['allowed_tools'] = $allowed_tools;
        null !== $api_key_ref && $obj['api_key_ref'] = $api_key_ref;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

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
        $obj['allowed_tools'] = $allowedTools;

        return $obj;
    }

    public function withAPIKeyRef(?string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj['api_key_ref'] = $apiKeyRef;

        return $obj;
    }
}
