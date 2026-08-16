<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConfigShape = array{
 *   bargeIn: bool,
 *   speakOnEnter: string|null,
 *   summarizeOnEnd: bool,
 *   voice: string|null,
 * }
 */
final class Config implements BaseModel
{
    /** @use SdkModel<ConfigShape> */
    use SdkModel;

    /**
     * When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     */
    #[Required('barge_in')]
    public bool $bargeIn;

    /**
     * Text spoken on meeting entry, or null if not set.
     */
    #[Required('speak_on_enter')]
    public ?string $speakOnEnter;

    /**
     * Whether a summary artifact is generated on session end.
     */
    #[Required('summarize_on_end')]
    public bool $summarizeOnEnd;

    /**
     * Configured voice identifier, or null if not set.
     */
    #[Required]
    public ?string $voice;

    /**
     * `new Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Config::with(bargeIn: ..., speakOnEnter: ..., summarizeOnEnd: ..., voice: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Config)
     *   ->withBargeIn(...)
     *   ->withSpeakOnEnter(...)
     *   ->withSummarizeOnEnd(...)
     *   ->withVoice(...)
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
        bool $bargeIn,
        ?string $speakOnEnter,
        bool $summarizeOnEnd,
        ?string $voice
    ): self {
        $self = new self;

        $self['bargeIn'] = $bargeIn;
        $self['speakOnEnter'] = $speakOnEnter;
        $self['summarizeOnEnd'] = $summarizeOnEnd;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     */
    public function withBargeIn(bool $bargeIn): self
    {
        $self = clone $this;
        $self['bargeIn'] = $bargeIn;

        return $self;
    }

    /**
     * Text spoken on meeting entry, or null if not set.
     */
    public function withSpeakOnEnter(?string $speakOnEnter): self
    {
        $self = clone $this;
        $self['speakOnEnter'] = $speakOnEnter;

        return $self;
    }

    /**
     * Whether a summary artifact is generated on session end.
     */
    public function withSummarizeOnEnd(bool $summarizeOnEnd): self
    {
        $self = clone $this;
        $self['summarizeOnEnd'] = $summarizeOnEnd;

        return $self;
    }

    /**
     * Configured voice identifier, or null if not set.
     */
    public function withVoice(?string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }
}
