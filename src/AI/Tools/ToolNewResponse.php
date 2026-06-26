<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToolNewResponseShape = array{
 *   id: string,
 *   toolDefinition: array<string,mixed>,
 *   type: string,
 *   createdAt?: string|null,
 *   displayName?: string|null,
 *   timeoutMs?: int|null,
 * }
 */
final class ToolNewResponse implements BaseModel
{
    /** @use SdkModel<ToolNewResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var array<string,mixed> $toolDefinition */
    #[Required('tool_definition', map: 'mixed')]
    public array $toolDefinition;

    #[Required]
    public string $type;

    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /**
     * `new ToolNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolNewResponse::with(id: ..., toolDefinition: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolNewResponse)->withID(...)->withToolDefinition(...)->withType(...)
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
     * @param array<string,mixed> $toolDefinition
     */
    public static function with(
        string $id,
        array $toolDefinition,
        string $type,
        ?string $createdAt = null,
        ?string $displayName = null,
        ?int $timeoutMs = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['toolDefinition'] = $toolDefinition;
        $self['type'] = $type;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param array<string,mixed> $toolDefinition
     */
    public function withToolDefinition(array $toolDefinition): self
    {
        $self = clone $this;
        $self['toolDefinition'] = $toolDefinition;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }
}
