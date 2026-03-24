<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update Tool.
 *
 * @see Telnyx\Services\AI\ToolsService::update()
 *
 * @phpstan-type ToolUpdateParamsShape = array{
 *   displayName?: string|null,
 *   function?: array<string,mixed>|null,
 *   handoff?: array<string,mixed>|null,
 *   invite?: array<string,mixed>|null,
 *   retrieval?: array<string,mixed>|null,
 *   timeoutMs?: int|null,
 *   type?: string|null,
 *   webhook?: array<string,mixed>|null,
 * }
 */
final class ToolUpdateParams implements BaseModel
{
    /** @use SdkModel<ToolUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('display_name')]
    public ?string $displayName;

    /** @var array<string,mixed>|null $function */
    #[Optional(map: 'mixed')]
    public ?array $function;

    /** @var array<string,mixed>|null $handoff */
    #[Optional(map: 'mixed')]
    public ?array $handoff;

    /** @var array<string,mixed>|null $invite */
    #[Optional(map: 'mixed')]
    public ?array $invite;

    /** @var array<string,mixed>|null $retrieval */
    #[Optional(map: 'mixed')]
    public ?array $retrieval;

    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    #[Optional]
    public ?string $type;

    /** @var array<string,mixed>|null $webhook */
    #[Optional(map: 'mixed')]
    public ?array $webhook;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $function
     * @param array<string,mixed>|null $handoff
     * @param array<string,mixed>|null $invite
     * @param array<string,mixed>|null $retrieval
     * @param array<string,mixed>|null $webhook
     */
    public static function with(
        ?string $displayName = null,
        ?array $function = null,
        ?array $handoff = null,
        ?array $invite = null,
        ?array $retrieval = null,
        ?int $timeoutMs = null,
        ?string $type = null,
        ?array $webhook = null,
    ): self {
        $self = new self;

        null !== $displayName && $self['displayName'] = $displayName;
        null !== $function && $self['function'] = $function;
        null !== $handoff && $self['handoff'] = $handoff;
        null !== $invite && $self['invite'] = $invite;
        null !== $retrieval && $self['retrieval'] = $retrieval;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;
        null !== $type && $self['type'] = $type;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * @param array<string,mixed> $function
     */
    public function withFunction(array $function): self
    {
        $self = clone $this;
        $self['function'] = $function;

        return $self;
    }

    /**
     * @param array<string,mixed> $handoff
     */
    public function withHandoff(array $handoff): self
    {
        $self = clone $this;
        $self['handoff'] = $handoff;

        return $self;
    }

    /**
     * @param array<string,mixed> $invite
     */
    public function withInvite(array $invite): self
    {
        $self = clone $this;
        $self['invite'] = $invite;

        return $self;
    }

    /**
     * @param array<string,mixed> $retrieval
     */
    public function withRetrieval(array $retrieval): self
    {
        $self = clone $this;
        $self['retrieval'] = $retrieval;

        return $self;
    }

    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param array<string,mixed> $webhook
     */
    public function withWebhook(array $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
