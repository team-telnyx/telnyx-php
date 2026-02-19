<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceUpdateParticipantResponse;

use Telnyx\Conferences\ConferenceUpdateParticipantResponse\Data\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   conferenceID?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   endConferenceOnExit?: bool|null,
 *   label?: string|null,
 *   muted?: bool|null,
 *   onHold?: bool|null,
 *   softEndConferenceOnExit?: bool|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 *   whisperCallControlIDs?: list<string>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the participant.
     */
    #[Optional]
    public ?string $id;

    /**
     * Unique identifier and token for controlling the participant's call leg.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * Unique identifier for the call leg.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * Unique identifier for the conference.
     */
    #[Optional('conference_id')]
    public ?string $conferenceID;

    /**
     * Timestamp when the participant joined.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Whether the conference ends when this participant exits.
     */
    #[Optional('end_conference_on_exit')]
    public ?bool $endConferenceOnExit;

    /**
     * Label assigned to the participant when joining.
     */
    #[Optional]
    public ?string $label;

    /**
     * Whether the participant is muted.
     */
    #[Optional]
    public ?bool $muted;

    /**
     * Whether the participant is on hold.
     */
    #[Optional('on_hold')]
    public ?bool $onHold;

    /**
     * Whether the conference soft-ends when this participant exits.
     */
    #[Optional('soft_end_conference_on_exit')]
    public ?bool $softEndConferenceOnExit;

    /**
     * Status of the participant.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Timestamp when the participant was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * List of call control IDs this participant is whispering to.
     *
     * @var list<string>|null $whisperCallControlIDs
     */
    #[Optional('whisper_call_control_ids', list: 'string')]
    public ?array $whisperCallControlIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     * @param list<string>|null $whisperCallControlIDs
     */
    public static function with(
        ?string $id = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $conferenceID = null,
        ?\DateTimeInterface $createdAt = null,
        ?bool $endConferenceOnExit = null,
        ?string $label = null,
        ?bool $muted = null,
        ?bool $onHold = null,
        ?bool $softEndConferenceOnExit = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?array $whisperCallControlIDs = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $label && $self['label'] = $label;
        null !== $muted && $self['muted'] = $muted;
        null !== $onHold && $self['onHold'] = $onHold;
        null !== $softEndConferenceOnExit && $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $whisperCallControlIDs && $self['whisperCallControlIDs'] = $whisperCallControlIDs;

        return $self;
    }

    /**
     * Uniquely identifies the participant.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Unique identifier and token for controlling the participant's call leg.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * Unique identifier for the call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * Unique identifier for the conference.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $self = clone $this;
        $self['conferenceID'] = $conferenceID;

        return $self;
    }

    /**
     * Timestamp when the participant joined.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Whether the conference ends when this participant exits.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

        return $self;
    }

    /**
     * Label assigned to the participant when joining.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Whether the participant is muted.
     */
    public function withMuted(bool $muted): self
    {
        $self = clone $this;
        $self['muted'] = $muted;

        return $self;
    }

    /**
     * Whether the participant is on hold.
     */
    public function withOnHold(bool $onHold): self
    {
        $self = clone $this;
        $self['onHold'] = $onHold;

        return $self;
    }

    /**
     * Whether the conference soft-ends when this participant exits.
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $self = clone $this;
        $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;

        return $self;
    }

    /**
     * Status of the participant.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Timestamp when the participant was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * List of call control IDs this participant is whispering to.
     *
     * @param list<string> $whisperCallControlIDs
     */
    public function withWhisperCallControlIDs(
        array $whisperCallControlIDs
    ): self {
        $self = clone $this;
        $self['whisperCallControlIDs'] = $whisperCallControlIDs;

        return $self;
    }
}
