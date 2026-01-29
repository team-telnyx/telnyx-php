<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceListParticipantsResponse\Conference;
use Telnyx\Conferences\ConferenceListParticipantsResponse\RecordType;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceShape from \Telnyx\Conferences\ConferenceListParticipantsResponse\Conference
 *
 * @phpstan-type ConferenceListParticipantsResponseShape = array{
 *   id: string,
 *   callControlID: string,
 *   callLegID: string,
 *   conference: \Telnyx\Conferences\ConferenceListParticipantsResponse\Conference|ConferenceShape,
 *   createdAt: string,
 *   endConferenceOnExit: bool,
 *   muted: bool,
 *   onHold: bool,
 *   recordType: RecordType|value-of<RecordType>,
 *   softEndConferenceOnExit: bool,
 *   status: Status|value-of<Status>,
 *   updatedAt: string,
 *   whisperCallControlIDs: list<string>,
 * }
 */
final class ConferenceListParticipantsResponse implements BaseModel
{
    /** @use SdkModel<ConferenceListParticipantsResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies the participant.
     */
    #[Required]
    public string $id;

    /**
     * Call Control ID associated with the partiipant of the conference.
     */
    #[Required('call_control_id')]
    public string $callControlID;

    /**
     * Uniquely identifies the call leg associated with the participant.
     */
    #[Required('call_leg_id')]
    public string $callLegID;

    /**
     * Info about the conference that the participant is in.
     */
    #[Required]
    public Conference $conference;

    /**
     * ISO 8601 formatted date of when the participant was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * Whether the conference will end and all remaining participants be hung up after the participant leaves the conference.
     */
    #[Required('end_conference_on_exit')]
    public bool $endConferenceOnExit;

    /**
     * Whether the participant is muted.
     */
    #[Required]
    public bool $muted;

    /**
     * Whether the participant is put on_hold.
     */
    #[Required('on_hold')]
    public bool $onHold;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Whether the conference will end after the participant leaves the conference.
     */
    #[Required('soft_end_conference_on_exit')]
    public bool $softEndConferenceOnExit;

    /**
     * The status of the participant with respect to the lifecycle within the conference.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * ISO 8601 formatted date of when the participant was last updated.
     */
    #[Required('updated_at')]
    public string $updatedAt;

    /**
     * Array of unique call_control_ids the participant can whisper to..
     *
     * @var list<string> $whisperCallControlIDs
     */
    #[Required('whisper_call_control_ids', list: 'string')]
    public array $whisperCallControlIDs;

    /**
     * `new ConferenceListParticipantsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceListParticipantsResponse::with(
     *   id: ...,
     *   callControlID: ...,
     *   callLegID: ...,
     *   conference: ...,
     *   createdAt: ...,
     *   endConferenceOnExit: ...,
     *   muted: ...,
     *   onHold: ...,
     *   recordType: ...,
     *   softEndConferenceOnExit: ...,
     *   status: ...,
     *   updatedAt: ...,
     *   whisperCallControlIDs: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceListParticipantsResponse)
     *   ->withID(...)
     *   ->withCallControlID(...)
     *   ->withCallLegID(...)
     *   ->withConference(...)
     *   ->withCreatedAt(...)
     *   ->withEndConferenceOnExit(...)
     *   ->withMuted(...)
     *   ->withOnHold(...)
     *   ->withRecordType(...)
     *   ->withSoftEndConferenceOnExit(...)
     *   ->withStatus(...)
     *   ->withUpdatedAt(...)
     *   ->withWhisperCallControlIDs(...)
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
     * @param Conference|ConferenceShape $conference
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     * @param list<string> $whisperCallControlIDs
     */
    public static function with(
        string $id,
        string $callControlID,
        string $callLegID,
        Conference|array $conference,
        string $createdAt,
        bool $endConferenceOnExit,
        bool $muted,
        bool $onHold,
        RecordType|string $recordType,
        bool $softEndConferenceOnExit,
        Status|string $status,
        string $updatedAt,
        array $whisperCallControlIDs,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['callControlID'] = $callControlID;
        $self['callLegID'] = $callLegID;
        $self['conference'] = $conference;
        $self['createdAt'] = $createdAt;
        $self['endConferenceOnExit'] = $endConferenceOnExit;
        $self['muted'] = $muted;
        $self['onHold'] = $onHold;
        $self['recordType'] = $recordType;
        $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;
        $self['status'] = $status;
        $self['updatedAt'] = $updatedAt;
        $self['whisperCallControlIDs'] = $whisperCallControlIDs;

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
     * Call Control ID associated with the partiipant of the conference.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * Uniquely identifies the call leg associated with the participant.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * Info about the conference that the participant is in.
     *
     * @param Conference|ConferenceShape $conference
     */
    public function withConference(
        Conference|array $conference,
    ): self {
        $self = clone $this;
        $self['conference'] = $conference;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the participant was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Whether the conference will end and all remaining participants be hung up after the participant leaves the conference.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

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
     * Whether the participant is put on_hold.
     */
    public function withOnHold(bool $onHold): self
    {
        $self = clone $this;
        $self['onHold'] = $onHold;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Whether the conference will end after the participant leaves the conference.
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $self = clone $this;
        $self['softEndConferenceOnExit'] = $softEndConferenceOnExit;

        return $self;
    }

    /**
     * The status of the participant with respect to the lifecycle within the conference.
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
     * ISO 8601 formatted date of when the participant was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Array of unique call_control_ids the participant can whisper to..
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
