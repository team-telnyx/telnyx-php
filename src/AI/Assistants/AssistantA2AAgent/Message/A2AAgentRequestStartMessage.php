<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantA2AAgent\Message;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type A2AAgentRequestStartMessageShape = array{
 *   content: string, type: 'request_start', timingMs?: int|null
 * }
 */
final class A2AAgentRequestStartMessage implements BaseModel
{
    /** @use SdkModel<A2AAgentRequestStartMessageShape> */
    use SdkModel;

    /**
     * Speak the filler message immediately when the call to the agent begins.
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
     * `new A2AAgentRequestStartMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * A2AAgentRequestStartMessage::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new A2AAgentRequestStartMessage)->withContent(...)
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
     * Speak the filler message immediately when the call to the agent begins.
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
