<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceDetailRecordShape = array{
 *   recordType: string,
 *   id?: string|null,
 *   callLegID?: string|null,
 *   callSec?: int|null,
 *   callSessionID?: string|null,
 *   connectionID?: string|null,
 *   endedAt?: \DateTimeInterface|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   isTelnyxBillable?: bool|null,
 *   name?: string|null,
 *   participantCallSec?: int|null,
 *   participantCount?: int|null,
 *   region?: string|null,
 *   startedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 * }
 */
final class ConferenceDetailRecord implements BaseModel
{
    /** @use SdkModel<ConferenceDetailRecordShape> */
    use SdkModel;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Conference id.
     */
    #[Optional]
    public ?string $id;

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * Duration of the conference call in seconds.
     */
    #[Optional('call_sec')]
    public ?int $callSec;

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Connection id.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Conference end time.
     */
    #[Optional('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * Conference expiry time.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Optional('is_telnyx_billable')]
    public ?bool $isTelnyxBillable;

    /**
     * Conference name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Sum of the conference call duration for all participants in seconds.
     */
    #[Optional('participant_call_sec')]
    public ?int $participantCallSec;

    /**
     * Number of participants that joined the conference call.
     */
    #[Optional('participant_count')]
    public ?int $participantCount;

    /**
     * Region where the conference is hosted.
     */
    #[Optional]
    public ?string $region;

    /**
     * Conference start time.
     */
    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

    /**
     * User id.
     */
    #[Optional('user_id')]
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

        $obj['recordType'] = $recordType;

        null !== $id && $obj['id'] = $id;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSec && $obj['callSec'] = $callSec;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $endedAt && $obj['endedAt'] = $endedAt;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $isTelnyxBillable && $obj['isTelnyxBillable'] = $isTelnyxBillable;
        null !== $name && $obj['name'] = $name;
        null !== $participantCallSec && $obj['participantCallSec'] = $participantCallSec;
        null !== $participantCount && $obj['participantCount'] = $participantCount;
        null !== $region && $obj['region'] = $region;
        null !== $startedAt && $obj['startedAt'] = $startedAt;
        null !== $userID && $obj['userID'] = $userID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Conference id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

        return $obj;
    }

    /**
     * Duration of the conference call in seconds.
     */
    public function withCallSec(int $callSec): self
    {
        $obj = clone $this;
        $obj['callSec'] = $callSec;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

        return $obj;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Conference end time.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $obj = clone $this;
        $obj['endedAt'] = $endedAt;

        return $obj;
    }

    /**
     * Conference expiry time.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $obj = clone $this;
        $obj['isTelnyxBillable'] = $isTelnyxBillable;

        return $obj;
    }

    /**
     * Conference name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Sum of the conference call duration for all participants in seconds.
     */
    public function withParticipantCallSec(int $participantCallSec): self
    {
        $obj = clone $this;
        $obj['participantCallSec'] = $participantCallSec;

        return $obj;
    }

    /**
     * Number of participants that joined the conference call.
     */
    public function withParticipantCount(int $participantCount): self
    {
        $obj = clone $this;
        $obj['participantCount'] = $participantCount;

        return $obj;
    }

    /**
     * Region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * Conference start time.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
