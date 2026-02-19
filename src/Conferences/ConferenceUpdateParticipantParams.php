<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceUpdateParticipantParams\BeepEnabled;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update properties of a conference participant.
 *
 * @see Telnyx\Services\ConferencesService::updateParticipant()
 *
 * @phpstan-type ConferenceUpdateParticipantParamsShape = array{
 *   id: string,
 *   beepEnabled?: null|BeepEnabled|value-of<BeepEnabled>,
 *   endConferenceOnExit?: bool|null,
 *   softEndConferenceOnExit?: bool|null,
 * }
 */
final class ConferenceUpdateParticipantParams implements BaseModel
{
    /** @use SdkModel<ConferenceUpdateParticipantParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * Whether entry/exit beeps are enabled for this participant.
     *
     * @var value-of<BeepEnabled>|null $beepEnabled
     */
    #[Optional('beep_enabled', enum: BeepEnabled::class)]
    public ?string $beepEnabled;

    /**
     * Whether the conference should end when this participant exits.
     */
    #[Optional('end_conference_on_exit')]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the conference should soft-end when this participant exits. A soft end will stop new participants from joining but allow existing participants to remain.
     */
    #[Optional('soft_end_conference_on_exit')]
    public ?bool $softEndConferenceOnExit;

    /**
     * `new ConferenceUpdateParticipantParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceUpdateParticipantParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceUpdateParticipantParams)->withID(...)
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
     * @param BeepEnabled|value-of<BeepEnabled>|null $beepEnabled
     */
    public static function with(
        string $id,
        BeepEnabled|string|null $beepEnabled = null,
        ?bool $endConferenceOnExit = null,
        ?bool $softEndConferenceOnExit = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $beepEnabled && $self['beepEnabled'] = $beepEnabled;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $softEndConferenceOnExit && $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether entry/exit beeps are enabled for this participant.
     *
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled
     */
    public function withBeepEnabled(BeepEnabled|string $beepEnabled): self
    {
        $self = clone $this;
        $self['beepEnabled'] = $beepEnabled;

        return $self;
    }

    /**
     * Whether the conference should end when this participant exits.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

        return $self;
    }

    /**
     * Whether the conference should soft-end when this participant exits. A soft end will stop new participants from joining but allow existing participants to remain.
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $self = clone $this;
        $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;

        return $self;
    }
}
