<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantA2AAgent\Message;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type A2AAgentRequestResponseDelayedMessageShape = array{
 *   content: string, timingMs: int, type: 'request_response_delayed'
 * }
 */
final class A2AAgentRequestResponseDelayedMessage implements BaseModel
{
    /** @use SdkModel<A2AAgentRequestResponseDelayedMessageShape> */
    use SdkModel;

    /**
     * Speak the filler message only if the agent has not answered yet after `timing_ms`.
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
     * How long to wait, in milliseconds, before speaking this message.
     */
    #[Required('timing_ms')]
    public int $timingMs;

    /**
     * `new A2AAgentRequestResponseDelayedMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * A2AAgentRequestResponseDelayedMessage::with(content: ..., timingMs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new A2AAgentRequestResponseDelayedMessage)->withContent(...)->withTimingMs(...)
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
     * How long to wait, in milliseconds, before speaking this message.
     */
    public function withTimingMs(int $timingMs): self
    {
        $self = clone $this;
        $self['timingMs'] = $timingMs;

        return $self;
    }

    /**
     * Speak the filler message only if the agent has not answered yet after `timing_ms`.
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
