<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sends audio / text-to-speech into a meeting session.
 *
 * @see Telnyx\Services\MeetingSessions\ActionsService::speak()
 *
 * @phpstan-type ActionSpeakParamsShape = array{
 *   text: string, interrupt?: bool|null, voice?: string|null
 * }
 */
final class ActionSpeakParams implements BaseModel
{
    /** @use SdkModel<ActionSpeakParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Text for the bot to speak.
     */
    #[Required]
    public string $text;

    /**
     * If true, interrupt any currently playing audio to speak this text immediately.
     */
    #[Optional]
    public ?bool $interrupt;

    /**
     * Voice identifier to use for this utterance. When supplied, it overrides the session-default voice configured at creation; otherwise the speak action uses that session default.
     */
    #[Optional]
    public ?string $voice;

    /**
     * `new ActionSpeakParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSpeakParams::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSpeakParams)->withText(...)
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
    public static function with(
        string $text,
        ?bool $interrupt = null,
        ?string $voice = null
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $interrupt && $self['interrupt'] = $interrupt;
        null !== $voice && $self['voice'] = $voice;

        return $self;
    }

    /**
     * Text for the bot to speak.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * If true, interrupt any currently playing audio to speak this text immediately.
     */
    public function withInterrupt(bool $interrupt): self
    {
        $self = clone $this;
        $self['interrupt'] = $interrupt;

        return $self;
    }

    /**
     * Voice identifier to use for this utterance. When supplied, it overrides the session-default voice configured at creation; otherwise the speak action uses that session default.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }
}
