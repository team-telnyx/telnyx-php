<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceDetailRecordShape = array{
 *   record_type: string,
 *   id?: string|null,
 *   call_leg_id?: string|null,
 *   call_sec?: int|null,
 *   call_session_id?: string|null,
 *   connection_id?: string|null,
 *   ended_at?: \DateTimeInterface|null,
 *   expires_at?: \DateTimeInterface|null,
 *   is_telnyx_billable?: bool|null,
 *   name?: string|null,
 *   participant_call_sec?: int|null,
 *   participant_count?: int|null,
 *   region?: string|null,
 *   started_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
 * }
 */
final class ConferenceDetailRecord implements BaseModel
{
    /** @use SdkModel<ConferenceDetailRecordShape> */
    use SdkModel;

    #[Api]
    public string $record_type;

    /**
     * Conference id.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * Duration of the conference call in seconds.
     */
    #[Api(optional: true)]
    public ?int $call_sec;

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * Connection id.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * Conference end time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $ended_at;

    /**
     * Conference expiry time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expires_at;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Api(optional: true)]
    public ?bool $is_telnyx_billable;

    /**
     * Conference name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Sum of the conference call duration for all participants in seconds.
     */
    #[Api(optional: true)]
    public ?int $participant_call_sec;

    /**
     * Number of participants that joined the conference call.
     */
    #[Api(optional: true)]
    public ?int $participant_count;

    /**
     * Region where the conference is hosted.
     */
    #[Api(optional: true)]
    public ?string $region;

    /**
     * Conference start time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $started_at;

    /**
     * User id.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    /**
     * `new ConferenceDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceDetailRecord::with(record_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceDetailRecord)->withRecordType(...)
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
        string $record_type = 'conference_detail_record',
        ?string $id = null,
        ?string $call_leg_id = null,
        ?int $call_sec = null,
        ?string $call_session_id = null,
        ?string $connection_id = null,
        ?\DateTimeInterface $ended_at = null,
        ?\DateTimeInterface $expires_at = null,
        ?bool $is_telnyx_billable = null,
        ?string $name = null,
        ?int $participant_call_sec = null,
        ?int $participant_count = null,
        ?string $region = null,
        ?\DateTimeInterface $started_at = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        $obj->record_type = $record_type;

        null !== $id && $obj->id = $id;
        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_sec && $obj->call_sec = $call_sec;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $ended_at && $obj->ended_at = $ended_at;
        null !== $expires_at && $obj->expires_at = $expires_at;
        null !== $is_telnyx_billable && $obj->is_telnyx_billable = $is_telnyx_billable;
        null !== $name && $obj->name = $name;
        null !== $participant_call_sec && $obj->participant_call_sec = $participant_call_sec;
        null !== $participant_count && $obj->participant_count = $participant_count;
        null !== $region && $obj->region = $region;
        null !== $started_at && $obj->started_at = $started_at;
        null !== $user_id && $obj->user_id = $user_id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * Conference id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * Duration of the conference call in seconds.
     */
    public function withCallSec(int $callSec): self
    {
        $obj = clone $this;
        $obj->call_sec = $callSec;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * Conference end time.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->ended_at = $endedAt;

        return $obj;
    }

    /**
     * Conference expiry time.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expires_at = $expiresAt;

        return $obj;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $obj = clone $this;
        $obj->is_telnyx_billable = $isTelnyxBillable;

        return $obj;
    }

    /**
     * Conference name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Sum of the conference call duration for all participants in seconds.
     */
    public function withParticipantCallSec(int $participantCallSec): self
    {
        $obj = clone $this;
        $obj->participant_call_sec = $participantCallSec;

        return $obj;
    }

    /**
     * Number of participants that joined the conference call.
     */
    public function withParticipantCount(int $participantCount): self
    {
        $obj = clone $this;
        $obj->participant_count = $participantCount;

        return $obj;
    }

    /**
     * Region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    /**
     * Conference start time.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->started_at = $startedAt;

        return $obj;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }
}
