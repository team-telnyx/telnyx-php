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
 *   id: string,
 *   audioGate: AudioGate|value-of<AudioGate>,
 *   dynamicVariables: array<string,string>|null,
 *   leaveOnEnd: bool,
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
     * Audio gating strategy in force for the assistant call leg.
     *
     * @var value-of<AudioGate> $audioGate
     */
    #[Required('audio_gate', enum: AudioGate::class)]
    public string $audioGate;

    /**
     * The dynamic variables in force for this session, or null when none were supplied.
     *
     * @var array<string,string>|null $dynamicVariables
     */
    #[Required('dynamic_variables', map: 'string')]
    public ?array $dynamicVariables;

    /**
     * Whether the bot leaves when the Assistant's conversation ends or fails.
     */
    #[Required('leave_on_end')]
    public bool $leaveOnEnd;

    /**
     * `new Assistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Assistant::with(id: ..., audioGate: ..., dynamicVariables: ..., leaveOnEnd: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Assistant)
     *   ->withID(...)
     *   ->withAudioGate(...)
     *   ->withDynamicVariables(...)
     *   ->withLeaveOnEnd(...)
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
     * @param array<string,string>|null $dynamicVariables
     */
    public static function with(
        string $id,
        AudioGate|string $audioGate,
        ?array $dynamicVariables,
        bool $leaveOnEnd,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['audioGate'] = $audioGate;
        $self['dynamicVariables'] = $dynamicVariables;
        $self['leaveOnEnd'] = $leaveOnEnd;

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
     * Audio gating strategy in force for the assistant call leg.
     *
     * @param AudioGate|value-of<AudioGate> $audioGate
     */
    public function withAudioGate(AudioGate|string $audioGate): self
    {
        $self = clone $this;
        $self['audioGate'] = $audioGate;

        return $self;
    }

    /**
     * The dynamic variables in force for this session, or null when none were supplied.
     *
     * @param array<string,string>|null $dynamicVariables
     */
    public function withDynamicVariables(?array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }

    /**
     * Whether the bot leaves when the Assistant's conversation ends or fails.
     */
    public function withLeaveOnEnd(bool $leaveOnEnd): self
    {
        $self = clone $this;
        $self['leaveOnEnd'] = $leaveOnEnd;

        return $self;
    }
}
