<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\CalendarConnections\MeetingSessionAssistant\AudioGate;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type MeetingSessionAssistantShape = array{
 *   id: string,
 *   audioGate: AudioGate|value-of<AudioGate>,
 *   leaveOnEnd: bool,
 *   dynamicVariables?: array<string,string>|null,
 * }
 */
final class MeetingSessionAssistant implements BaseModel
{
    /** @use SdkModel<MeetingSessionAssistantShape> */
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
     * Whether the bot leaves when the Assistant's conversation ends or fails.
     */
    #[Required('leave_on_end')]
    public bool $leaveOnEnd;

    /**
     * Dynamic variables in individual-session responses; null when none were supplied. Omitted from session list items.
     *
     * @var array<string,string>|null $dynamicVariables
     */
    #[Optional('dynamic_variables', map: 'string', nullable: true)]
    public ?array $dynamicVariables;

    /**
     * `new MeetingSessionAssistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionAssistant::with(id: ..., audioGate: ..., leaveOnEnd: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionAssistant)
     *   ->withID(...)
     *   ->withAudioGate(...)
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
     * @param Omitted|array<string,string>|null $dynamicVariables
     */
    public static function with(
        string $id,
        AudioGate|string $audioGate,
        bool $leaveOnEnd,
        Omitted|array|null $dynamicVariables = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['audioGate'] = $audioGate;
        $self['leaveOnEnd'] = $leaveOnEnd;

        Omitted::VALUE !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;

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
     * Whether the bot leaves when the Assistant's conversation ends or fails.
     */
    public function withLeaveOnEnd(bool $leaveOnEnd): self
    {
        $self = clone $this;
        $self['leaveOnEnd'] = $leaveOnEnd;

        return $self;
    }

    /**
     * Dynamic variables in individual-session responses; null when none were supplied. Omitted from session list items.
     *
     * @param array<string,string>|null $dynamicVariables
     */
    public function withDynamicVariables(?array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }
}
