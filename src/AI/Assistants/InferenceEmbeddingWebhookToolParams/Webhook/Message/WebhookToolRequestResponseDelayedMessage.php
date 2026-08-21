<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\Webhook\Message;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebhookToolRequestResponseDelayedMessageShape = array{
 *   content: string, timingMs: int, type: 'request_response_delayed'
 * }
 */
final class WebhookToolRequestResponseDelayedMessage implements BaseModel
{
    /** @use SdkModel<WebhookToolRequestResponseDelayedMessageShape> */
    use SdkModel;

    /**
     * Speak the filler message after the configured delay if the webhook response is still pending.
     *
     * @var 'request_response_delayed' $type
     */
    #[Required]
    public string $type = 'request_response_delayed';

    /**
     * The text the assistant speaks.
     */
    #[Required]
    public string $content;

    /**
     * The delay in milliseconds from the start of the webhook request.
     */
    #[Required('timing_ms')]
    public int $timingMs;

    /**
     * `new WebhookToolRequestResponseDelayedMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookToolRequestResponseDelayedMessage::with(content: ..., timingMs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookToolRequestResponseDelayedMessage)
     *   ->withContent(...)
     *   ->withTimingMs(...)
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
    public static function with(string $content, int $timingMs): self
    {
        $self = new self;

        $self['content'] = $content;
        $self['timingMs'] = $timingMs;

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
     * The delay in milliseconds from the start of the webhook request.
     */
    public function withTimingMs(int $timingMs): self
    {
        $self = clone $this;
        $self['timingMs'] = $timingMs;

        return $self;
    }

    /**
     * Speak the filler message after the configured delay if the webhook response is still pending.
     *
     * @param 'request_response_delayed' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
