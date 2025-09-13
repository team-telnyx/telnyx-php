<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type conference_detail_record = array{
 *   recordType: string,
 *   id?: string,
 *   callLegID?: string,
 *   callSec?: int,
 *   callSessionID?: string,
 *   connectionID?: string,
 *   endedAt?: \DateTimeInterface,
 *   expiresAt?: \DateTimeInterface,
 *   isTelnyxBillable?: bool,
 *   name?: string,
 *   participantCallSec?: int,
 *   participantCount?: int,
 *   region?: string,
 *   startedAt?: \DateTimeInterface,
 *   userID?: string,
 * }
 */
final class ConferenceDetailRecord implements BaseModel
{
    /** @use SdkModel<conference_detail_record> */
    use SdkModel;

    #[Api('record_type')]
    public string $recordType;

    /**
     * Conference id.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * Duration of the conference call in seconds.
     */
    #[Api('call_sec', optional: true)]
    public ?int $callSec;

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * Connection id.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * Conference end time.
     */
    #[Api('ended_at', optional: true)]
    public ?\DateTimeInterface $endedAt;

    /**
     * Conference expiry time.
     */
    #[Api('expires_at', optional: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Api('is_telnyx_billable', optional: true)]
    public ?bool $isTelnyxBillable;

    /**
     * Conference name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Sum of the conference call duration for all participants in seconds.
     */
    #[Api('participant_call_sec', optional: true)]
    public ?int $participantCallSec;

    /**
     * Number of participants that joined the conference call.
     */
    #[Api('participant_count', optional: true)]
    public ?int $participantCount;

    /**
     * Region where the conference is hosted.
     */
    #[Api(optional: true)]
    public ?string $region;

    /**
     * Conference start time.
     */
    #[Api('started_at', optional: true)]
    public ?\DateTimeInterface $startedAt;

    /**
     * User id.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    /**
     * `new ConferenceDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceDetailRecord::with(recordType: ...)
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
        string $recordType = 'conference_detail_record',
        ?string $id = null,
        ?string $callLegID = null,
        ?int $callSec = null,
        ?string $callSessionID = null,
        ?string $connectionID = null,
        ?\DateTimeInterface $endedAt = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isTelnyxBillable = null,
        ?string $name = null,
        ?int $participantCallSec = null,
        ?int $participantCount = null,
        ?string $region = null,
        ?\DateTimeInterface $startedAt = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        $obj->recordType = $recordType;

        null !== $id && $obj->id = $id;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSec && $obj->callSec = $callSec;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $endedAt && $obj->endedAt = $endedAt;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $isTelnyxBillable && $obj->isTelnyxBillable = $isTelnyxBillable;
        null !== $name && $obj->name = $name;
        null !== $participantCallSec && $obj->participantCallSec = $participantCallSec;
        null !== $participantCount && $obj->participantCount = $participantCount;
        null !== $region && $obj->region = $region;
        null !== $startedAt && $obj->startedAt = $startedAt;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * Duration of the conference call in seconds.
     */
    public function withCallSec(int $callSec): self
    {
        $obj = clone $this;
        $obj->callSec = $callSec;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * Conference end time.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj->endedAt = $endedAt;

        return $obj;
    }

    /**
     * Conference expiry time.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $obj = clone $this;
        $obj->isTelnyxBillable = $isTelnyxBillable;

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
        $obj->participantCallSec = $participantCallSec;

        return $obj;
    }

    /**
     * Number of participants that joined the conference call.
     */
    public function withParticipantCount(int $participantCount): self
    {
        $obj = clone $this;
        $obj->participantCount = $participantCount;

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
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
