<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParticipantsResponse;

use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\Conference;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\RecordType;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   call_control_id: string,
 *   call_leg_id: string,
 *   conference: Conference,
 *   created_at: string,
 *   end_conference_on_exit: bool,
 *   muted: bool,
 *   on_hold: bool,
 *   record_type: value-of<RecordType>,
 *   soft_end_conference_on_exit: bool,
 *   status: value-of<Status>,
 *   updated_at: string,
 *   whisper_call_control_ids: list<string>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the participant.
     */
    #[Api]
    public string $id;

    /**
     * Call Control ID associated with the partiipant of the conference.
     */
    #[Api]
    public string $call_control_id;

    /**
     * Uniquely identifies the call leg associated with the participant.
     */
    #[Api]
    public string $call_leg_id;

    /**
     * Info about the conference that the participant is in.
     */
    #[Api]
    public Conference $conference;

    /**
     * ISO 8601 formatted date of when the participant was created.
     */
    #[Api]
    public string $created_at;

    /**
     * Whether the conference will end and all remaining participants be hung up after the participant leaves the conference.
     */
    #[Api]
    public bool $end_conference_on_exit;

    /**
     * Whether the participant is muted.
     */
    #[Api]
    public bool $muted;

    /**
     * Whether the participant is put on_hold.
     */
    #[Api]
    public bool $on_hold;

    /** @var value-of<RecordType> $record_type */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * Whether the conference will end after the participant leaves the conference.
     */
    #[Api]
    public bool $soft_end_conference_on_exit;

    /**
     * The status of the participant with respect to the lifecycle within the conference.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * ISO 8601 formatted date of when the participant was last updated.
     */
    #[Api]
    public string $updated_at;

    /**
     * Array of unique call_control_ids the participant can whisper to..
     *
     * @var list<string> $whisper_call_control_ids
     */
    #[Api(list: 'string')]
    public array $whisper_call_control_ids;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   call_control_id: ...,
     *   call_leg_id: ...,
     *   conference: ...,
     *   created_at: ...,
     *   end_conference_on_exit: ...,
     *   muted: ...,
     *   on_hold: ...,
     *   record_type: ...,
     *   soft_end_conference_on_exit: ...,
     *   status: ...,
     *   updated_at: ...,
     *   whisper_call_control_ids: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
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
     * @param Conference|array{id?: string|null, name?: string|null} $conference
     * @param RecordType|value-of<RecordType> $record_type
     * @param Status|value-of<Status> $status
     * @param list<string> $whisper_call_control_ids
     */
    public static function with(
        string $id,
        string $call_control_id,
        string $call_leg_id,
        Conference|array $conference,
        string $created_at,
        bool $end_conference_on_exit,
        bool $muted,
        bool $on_hold,
        RecordType|string $record_type,
        bool $soft_end_conference_on_exit,
        Status|string $status,
        string $updated_at,
        array $whisper_call_control_ids,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['call_control_id'] = $call_control_id;
        $obj['call_leg_id'] = $call_leg_id;
        $obj['conference'] = $conference;
        $obj['created_at'] = $created_at;
        $obj['end_conference_on_exit'] = $end_conference_on_exit;
        $obj['muted'] = $muted;
        $obj['on_hold'] = $on_hold;
        $obj['record_type'] = $record_type;
        $obj['soft_end_conference_on_exit'] = $soft_end_conference_on_exit;
        $obj['status'] = $status;
        $obj['updated_at'] = $updated_at;
        $obj['whisper_call_control_ids'] = $whisper_call_control_ids;

        return $obj;
    }

    /**
     * Uniquely identifies the participant.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Call Control ID associated with the partiipant of the conference.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * Uniquely identifies the call leg associated with the participant.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * Info about the conference that the participant is in.
     *
     * @param Conference|array{id?: string|null, name?: string|null} $conference
     */
    public function withConference(Conference|array $conference): self
    {
        $obj = clone $this;
        $obj['conference'] = $conference;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the participant was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Whether the conference will end and all remaining participants be hung up after the participant leaves the conference.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj['end_conference_on_exit'] = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant is muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj['muted'] = $muted;

        return $obj;
    }

    /**
     * Whether the participant is put on_hold.
     */
    public function withOnHold(bool $onHold): self
    {
        $obj = clone $this;
        $obj['on_hold'] = $onHold;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * Whether the conference will end after the participant leaves the conference.
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $obj = clone $this;
        $obj['soft_end_conference_on_exit'] = $softEndConferenceOnExit;

        return $obj;
    }

    /**
     * The status of the participant with respect to the lifecycle within the conference.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the participant was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Array of unique call_control_ids the participant can whisper to..
     *
     * @param list<string> $whisperCallControlIDs
     */
    public function withWhisperCallControlIDs(
        array $whisperCallControlIDs
    ): self {
        $obj = clone $this;
        $obj['whisper_call_control_ids'] = $whisperCallControlIDs;

        return $obj;
    }
}
