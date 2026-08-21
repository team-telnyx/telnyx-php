<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookToolRequestStartMessageShape = array{
 *   content: string, type: 'request_start', timingMs?: int|null
 * }
 */
final class WebhookToolRequestStartMessage implements BaseModel
{
    /** @use SdkModel<WebhookToolRequestStartMessageShape> */
    use SdkModel;

    /**
     * Speak the filler message immediately when the webhook request begins.
     *
     * @var 'request_start' $type
     */
    #[Required]
    public string $type = 'request_start';

    /**
     * The text the assistant speaks.
     */
    #[Required]
    public string $content;

    /**
     * An optional delay value. This value is ignored for `request_start` messages.
     */
    #[Optional('timing_ms')]
    public ?int $timingMs;

    /**
     * `new WebhookToolRequestStartMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookToolRequestStartMessage::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookToolRequestStartMessage)->withContent(...)
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
     */
    public static function with(string $content, ?int $timingMs = null): self
    {
        $self = new self;

        $self['content'] = $content;

        null !== $timingMs && $self['timingMs'] = $timingMs;

        return $self;
    }

    /**
     * The text the assistant speaks.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * Speak the filler message immediately when the webhook request begins.
     *
     * @param 'request_start' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * An optional delay value. This value is ignored for `request_start` messages.
     */
    public function withTimingMs(int $timingMs): self
    {
        $self = clone $this;
        $self['timingMs'] = $timingMs;

        return $self;
    }
}
