<?php

declare(strict_types=1);

namespace Telnyx\AI\McpServers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type McpServerUpdateResponseShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   name: string,
 *   type: string,
 *   url: string,
 *   allowedTools?: list<string>|null,
 *   apiKeyRef?: string|null,
 * }
 */
final class McpServerUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<McpServerUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $name;

    #[Api]
    public string $type;

    #[Api]
    public string $url;

    /** @var list<string>|null $allowedTools */
    #[Api('allowed_tools', list: 'string', nullable: true, optional: true)]
    public ?array $allowedTools;

    #[Api('api_key_ref', nullable: true, optional: true)]
    public ?string $apiKeyRef;

    /**
     * `new McpServerUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * McpServerUpdateResponse::with(
     *   id: ..., createdAt: ..., name: ..., type: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new McpServerUpdateResponse)
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
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->name = $name;
        $obj->type = $type;
        $obj->url = $url;

        null !== $allowedTools && $obj->allowedTools = $allowedTools;
        null !== $apiKeyRef && $obj->apiKeyRef = $apiKeyRef;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
}
