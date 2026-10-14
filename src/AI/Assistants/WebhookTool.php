<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\AI\Assistants\WebhookTool\Webhook;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WebhookShape from \Telnyx\AI\Assistants\WebhookTool\Webhook
 *
 * @phpstan-type WebhookToolShape = array{
 *   type: Type|value-of<Type>, webhook: Webhook|WebhookShape, timeoutMs?: int|null
 * }
 */
final class WebhookTool implements BaseModel
{
    /** @use SdkModel<WebhookToolShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public Webhook $webhook;

    /**
     * The maximum number of milliseconds to wait for the webhook to respond before the tool call is aborted. Set this at the tool level, as a sibling of `type` — a `timeout_ms` nested inside the `webhook` object is not applied, and the tool runs at this default instead.
     */
    #[Optional('timeout_ms')]
    public ?int $timeoutMs;

    /**
     * `new WebhookTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookTool::with(type: ..., webhook: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookTool)->withType(...)->withWebhook(...)
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
     * @param Type|value-of<Type> $type
     * @param Webhook|WebhookShape $webhook
     */
    public static function with(
        Type|string $type,
        Webhook|array $webhook,
        ?int $timeoutMs = null
    ): self {
        $self = new self;

        $self['type'] = $type;
        $self['webhook'] = $webhook;

        null !== $timeoutMs && $self['timeoutMs'] = $timeoutMs;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Webhook|WebhookShape $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }

    /**
     * The maximum number of milliseconds to wait for the webhook to respond before the tool call is aborted. Set this at the tool level, as a sibling of `type` — a `timeout_ms` nested inside the `webhook` object is not applied, and the tool runs at this default instead.
     */
    public function withTimeoutMs(int $timeoutMs): self
    {
        $self = clone $this;
        $self['timeoutMs'] = $timeoutMs;

        return $self;
    }
}
