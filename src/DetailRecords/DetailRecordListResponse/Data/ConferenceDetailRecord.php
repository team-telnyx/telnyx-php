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
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $id && $self['id'] = $id;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSec && $self['callSec'] = $callSec;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $endedAt && $self['endedAt'] = $endedAt;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $isTelnyxBillable && $self['isTelnyxBillable'] = $isTelnyxBillable;
        null !== $name && $self['name'] = $name;
        null !== $participantCallSec && $self['participantCallSec'] = $participantCallSec;
        null !== $participantCount && $self['participantCount'] = $participantCount;
        null !== $region && $self['region'] = $region;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Conference id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * Duration of the conference call in seconds.
     */
    public function withCallSec(int $callSec): self
    {
        $self = clone $this;
        $self['callSec'] = $callSec;

        return $self;
    }

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Connection id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Conference end time.
     */
    public function withEndedAt(\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * Conference expiry time.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $self = clone $this;
        $self['isTelnyxBillable'] = $isTelnyxBillable;

        return $self;
    }

    /**
     * Conference name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Sum of the conference call duration for all participants in seconds.
     */
    public function withParticipantCallSec(int $participantCallSec): self
    {
        $self = clone $this;
        $self['participantCallSec'] = $participantCallSec;

        return $self;
    }

    /**
     * Number of participants that joined the conference call.
     */
    public function withParticipantCount(int $participantCount): self
    {
        $self = clone $this;
        $self['participantCount'] = $participantCount;

        return $self;
    }

    /**
     * Region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Conference start time.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
