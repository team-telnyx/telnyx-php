<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceParticipantDetailRecordShape = array{
 *   recordType: string,
 *   id?: string|null,
 *   billedSec?: int|null,
 *   callLegID?: string|null,
 *   callSec?: int|null,
 *   callSessionID?: string|null,
 *   conferenceID?: string|null,
 *   cost?: string|null,
 *   currency?: string|null,
 *   destinationNumber?: string|null,
 *   isTelnyxBillable?: bool|null,
 *   joinedAt?: \DateTimeInterface|null,
 *   leftAt?: \DateTimeInterface|null,
 *   originatingNumber?: string|null,
 *   rate?: string|null,
 *   rateMeasuredIn?: string|null,
 *   userID?: string|null,
 * }
 */
final class ConferenceParticipantDetailRecord implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantDetailRecordShape> */
    use SdkModel;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Participant id.
     */
    #[Optional]
    public ?string $id;

    /**
     * Duration of the conference call for billing purposes.
     */
    #[Optional('billed_sec')]
    public ?int $billedSec;

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
     * Conference id.
     */
    #[Optional('conference_id')]
    public ?string $conferenceID;

    /**
     * Currency amount for Telnyx billing cost.
     */
    #[Optional]
    public ?string $cost;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Number called by the participant to join the conference.
     */
    #[Optional('destination_number')]
    public ?string $destinationNumber;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Optional('is_telnyx_billable')]
    public ?bool $isTelnyxBillable;

    /**
     * Participant join time.
     */
    #[Optional('joined_at')]
    public ?\DateTimeInterface $joinedAt;

    /**
     * Participant leave time.
     */
    #[Optional('left_at')]
    public ?\DateTimeInterface $leftAt;

    /**
     * Participant origin number used in the conference call.
     */
    #[Optional('originating_number')]
    public ?string $originatingNumber;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Optional('rate_measured_in')]
    public ?string $rateMeasuredIn;

    /**
     * User id.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * `new ConferenceParticipantDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceParticipantDetailRecord::with(recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceParticipantDetailRecord)->withRecordType(...)
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
        string $recordType = 'conference_participant_detail_record',
        ?string $id = null,
        ?int $billedSec = null,
        ?string $callLegID = null,
        ?int $callSec = null,
        ?string $callSessionID = null,
        ?string $conferenceID = null,
        ?string $cost = null,
        ?string $currency = null,
        ?string $destinationNumber = null,
        ?bool $isTelnyxBillable = null,
        ?\DateTimeInterface $joinedAt = null,
        ?\DateTimeInterface $leftAt = null,
        ?string $originatingNumber = null,
        ?string $rate = null,
        ?string $rateMeasuredIn = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $id && $self['id'] = $id;
        null !== $billedSec && $self['billedSec'] = $billedSec;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSec && $self['callSec'] = $callSec;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $cost && $self['cost'] = $cost;
        null !== $currency && $self['currency'] = $currency;
        null !== $destinationNumber && $self['destinationNumber'] = $destinationNumber;
        null !== $isTelnyxBillable && $self['isTelnyxBillable'] = $isTelnyxBillable;
        null !== $joinedAt && $self['joinedAt'] = $joinedAt;
        null !== $leftAt && $self['leftAt'] = $leftAt;
        null !== $originatingNumber && $self['originatingNumber'] = $originatingNumber;
        null !== $rate && $self['rate'] = $rate;
        null !== $rateMeasuredIn && $self['rateMeasuredIn'] = $rateMeasuredIn;
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
     * Participant id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Duration of the conference call for billing purposes.
     */
    public function withBilledSec(int $billedSec): self
    {
        $self = clone $this;
        $self['billedSec'] = $billedSec;

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
     * Conference id.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $self = clone $this;
        $self['conferenceID'] = $conferenceID;

        return $self;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Number called by the participant to join the conference.
     */
    public function withDestinationNumber(string $destinationNumber): self
    {
        $self = clone $this;
        $self['destinationNumber'] = $destinationNumber;

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
     * Participant join time.
     */
    public function withJoinedAt(\DateTimeInterface $joinedAt): self
    {
        $self = clone $this;
        $self['joinedAt'] = $joinedAt;

        return $self;
    }

    /**
     * Participant leave time.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $self = clone $this;
        $self['leftAt'] = $leftAt;

        return $self;
    }

    /**
     * Participant origin number used in the conference call.
     */
    public function withOriginatingNumber(string $originatingNumber): self
    {
        $self = clone $this;
        $self['originatingNumber'] = $originatingNumber;

        return $self;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $self = clone $this;
        $self['rateMeasuredIn'] = $rateMeasuredIn;

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
