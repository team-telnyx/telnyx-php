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
 * @phpstan-type data_alias = array{
 *   id: string,
 *   callControlID: string,
 *   callLegID: string,
 *   conference: Conference,
 *   createdAt: string,
 *   endConferenceOnExit: bool,
 *   muted: bool,
 *   onHold: bool,
 *   recordType: value-of<RecordType>,
 *   softEndConferenceOnExit: bool,
 *   status: value-of<Status>,
 *   updatedAt: string,
 *   whisperCallControlIDs: list<string>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Uniquely identifies the participant.
     */
    #[Api]
    public string $id;

    /**
     * Call Control ID associated with the partiipant of the conference.
     */
    #[Api('call_control_id')]
    public string $callControlID;

    /**
     * Uniquely identifies the call leg associated with the participant.
     */
    #[Api('call_leg_id')]
    public string $callLegID;

    /**
     * Info about the conference that the participant is in.
     */
    #[Api]
    public Conference $conference;

    /**
     * ISO 8601 formatted date of when the participant was created.
     */
    #[Api('created_at')]
    public string $createdAt;

    /**
     * Whether the conference will end and all remaining participants be hung up after the participant leaves the conference.
     */
    #[Api('end_conference_on_exit')]
    public bool $endConferenceOnExit;

    /**
     * Whether the participant is muted.
     */
    #[Api]
    public bool $muted;

    /**
     * Whether the participant is put on_hold.
     */
    #[Api('on_hold')]
    public bool $onHold;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Whether the conference will end after the participant leaves the conference.
     */
    #[Api('soft_end_conference_on_exit')]
    public bool $softEndConferenceOnExit;

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
    #[Api('updated_at')]
    public string $updatedAt;

    /**
     * Array of unique call_control_ids the participant can whisper to..
     *
     * @var list<string> $whisperCallControlIDs
     */
    #[Api('whisper_call_control_ids', list: 'string')]
    public array $whisperCallControlIDs;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     * @param list<string> $whisperCallControlIDs
     */
    public static function with(
        string $id,
        string $callControlID,
        string $callLegID,
        Conference $conference,
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
        $obj = new self;

        $obj->id = $id;
        $obj->callControlID = $callControlID;
        $obj->callLegID = $callLegID;
        $obj->conference = $conference;
        $obj->createdAt = $createdAt;
        $obj->endConferenceOnExit = $endConferenceOnExit;
        $obj->muted = $muted;
        $obj->onHold = $onHold;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        $obj->softEndConferenceOnExit = $softEndConferenceOnExit;
        $obj->status = $status instanceof Status ? $status->value : $status;
        $obj->updatedAt = $updatedAt;
        $obj->whisperCallControlIDs = $whisperCallControlIDs;

        return $obj;
    }

    /**
     * Uniquely identifies the participant.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Call Control ID associated with the partiipant of the conference.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * Uniquely identifies the call leg associated with the participant.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * Info about the conference that the participant is in.
     */
    public function withConference(Conference $conference): self
    {
        $obj = clone $this;
        $obj->conference = $conference;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the participant was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Whether the conference will end and all remaining participants be hung up after the participant leaves the conference.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj->endConferenceOnExit = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant is muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj->muted = $muted;

        return $obj;
    }

    /**
     * Whether the participant is put on_hold.
     */
    public function withOnHold(bool $onHold): self
    {
        $obj = clone $this;
        $obj->onHold = $onHold;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * Whether the conference will end after the participant leaves the conference.
     */
    public function withSoftEndConferenceOnExit(
        bool $softEndConferenceOnExit
    ): self {
        $obj = clone $this;
        $obj->softEndConferenceOnExit = $softEndConferenceOnExit;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the participant was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

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
        $obj->whisperCallControlIDs = $whisperCallControlIDs;

        return $obj;
    }
}
