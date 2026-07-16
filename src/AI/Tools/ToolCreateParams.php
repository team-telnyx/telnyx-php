<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create Tool.
 *
 * @see Telnyx\Services\AI\ToolsService::create()
 *
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 *
 * @phpstan-type ToolCreateParamsShape = array{
 *   displayName: string,
 *   type: string,
 *   clientSideTool?: array<string,mixed>|null,
 *   function?: array<string,mixed>|null,
 *   handoff?: array<string,mixed>|null,
 *   invite?: array<string,mixed>|null,
 *   pay?: null|PayToolParams|PayToolParamsShape,
 *   retrieval?: array<string,mixed>|null,
 *   timeoutMs?: int|null,
 *   webhook?: array<string,mixed>|null,
 * }
 */
final class ToolCreateParams implements BaseModel
{
    /** @use SdkModel<ToolCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('display_name')]
    public string $displayName;

    #[Required]
    public string $type;

    /** @var array<string,mixed>|null $clientSideTool */
    #[Optional('client_side_tool', map: 'mixed')]
    public ?array $clientSideTool;

    /** @var array<string,mixed>|null $function */
    #[Optional(map: 'mixed')]
    public ?array $function;

    /** @var array<string,mixed>|null $handoff */
    #[Optional(map: 'mixed')]
    public ?array $handoff;

    /** @var array<string,mixed>|null $invite */
    #[Optional(map: 'mixed')]
    public ?array $invite;

    #[Optional]
    public ?PayToolParams $pay;

    /** @var array<string,mixed>|null $retrieval */
    #[Optional(map: 'mixed')]
    public ?array $retrieval;

    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /** @var array<string,mixed>|null $webhook */
    #[Optional(map: 'mixed')]
    public ?array $webhook;

    /**
     * `new ToolCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolCreateParams::with(displayName: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolCreateParams)->withDisplayName(...)->withType(...)
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
     * @param array<string,mixed>|null $clientSideTool
     * @param array<string,mixed>|null $function
     * @param array<string,mixed>|null $handoff
     * @param array<string,mixed>|null $invite
     * @param PayToolParams|PayToolParamsShape|null $pay
     * @param array<string,mixed>|null $retrieval
     * @param array<string,mixed>|null $webhook
     */
    public static function with(
        string $displayName,
        string $type,
        ?array $clientSideTool = null,
        ?array $function = null,
        ?array $handoff = null,
        ?array $invite = null,
        PayToolParams|array|null $pay = null,
        ?array $retrieval = null,
        ?int $timeoutMs = null,
        ?array $webhook = null,
    ): self {
        $self = new self;

        $self['displayName'] = $displayName;
        $self['type'] = $type;

        null !== $clientSideTool && $self['clientSideTool'] = $clientSideTool;
        null !== $function && $self['function'] = $function;
        null !== $handoff && $self['handoff'] = $handoff;
        null !== $invite && $self['invite'] = $invite;
        null !== $pay && $self['pay'] = $pay;
        null !== $retrieval && $self['retrieval'] = $retrieval;
        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param array<string,mixed> $clientSideTool
     */
    public function withClientSideTool(array $clientSideTool): self
    {
        $self = clone $this;
        $self['clientSideTool'] = $clientSideTool;

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
     * @param PayToolParams|PayToolParamsShape $pay
     */
    public function withPay(PayToolParams|array $pay): self
    {
        $self = clone $this;
        $self['pay'] = $pay;

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
