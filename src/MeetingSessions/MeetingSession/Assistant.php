<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSession\Assistant\AudioGate;

/**
 * Assistant configuration if an assistant is attached, otherwise null.
 *
 * @phpstan-type AssistantShape = array{
 *   id: string, audioGate: AudioGate|value-of<AudioGate>
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * Identifier of the assistant.
     */
    #[Required]
    public string $id;

    /**
     * Audio gating strategy for the assistant call leg.
     *
     * @var value-of<AudioGate> $audioGate
     */
    #[Required('audio_gate', enum: AudioGate::class)]
    public string $audioGate;

    /**
     * `new Assistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Assistant::with(id: ..., audioGate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Assistant)->withID(...)->withAudioGate(...)
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
     * @param AudioGate|value-of<AudioGate> $audioGate
     */
    public static function with(string $id, AudioGate|string $audioGate): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['audioGate'] = $audioGate;

        return $self;
    }

    /**
     * Identifier of the assistant.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Audio gating strategy for the assistant call leg.
     *
     * @param AudioGate|value-of<AudioGate> $audioGate
     */
    public function withAudioGate(AudioGate|string $audioGate): self
    {
        $self = clone $this;
        $self['audioGate'] = $audioGate;

        return $self;
    }
}
