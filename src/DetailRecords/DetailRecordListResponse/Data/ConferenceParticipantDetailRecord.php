<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceParticipantDetailRecordShape = array{
 *   recordType: string,
 *   id?: string,
 *   billedSec?: int,
 *   callLegID?: string,
 *   callSec?: int,
 *   callSessionID?: string,
 *   conferenceID?: string,
 *   cost?: string,
 *   currency?: string,
 *   destinationNumber?: string,
 *   isTelnyxBillable?: bool,
 *   joinedAt?: \DateTimeInterface,
 *   leftAt?: \DateTimeInterface,
 *   originatingNumber?: string,
 *   rate?: string,
 *   rateMeasuredIn?: string,
 *   userID?: string,
 * }
 */
final class ConferenceParticipantDetailRecord implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantDetailRecordShape> */
    use SdkModel;

    #[Api('record_type')]
    public string $recordType;

    /**
     * Participant id.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Duration of the conference call for billing purposes.
     */
    #[Api('billed_sec', optional: true)]
    public ?int $billedSec;

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
     * Conference id.
     */
    #[Api('conference_id', optional: true)]
    public ?string $conferenceID;

    /**
     * Currency amount for Telnyx billing cost.
     */
    #[Api(optional: true)]
    public ?string $cost;

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    #[Api(optional: true)]
    public ?string $currency;

    /**
     * Number called by the participant to join the conference.
     */
    #[Api('destination_number', optional: true)]
    public ?string $destinationNumber;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Api('is_telnyx_billable', optional: true)]
    public ?bool $isTelnyxBillable;

    /**
     * Participant join time.
     */
    #[Api('joined_at', optional: true)]
    public ?\DateTimeInterface $joinedAt;

    /**
     * Participant leave time.
     */
    #[Api('left_at', optional: true)]
    public ?\DateTimeInterface $leftAt;

    /**
     * Participant origin number used in the conference call.
     */
    #[Api('originating_number', optional: true)]
    public ?string $originatingNumber;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Api(optional: true)]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Api('rate_measured_in', optional: true)]
    public ?string $rateMeasuredIn;

    /**
     * User id.
     */
    #[Api('user_id', optional: true)]
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
        $obj = new self;

        $obj->recordType = $recordType;

        null !== $id && $obj->id = $id;
        null !== $billedSec && $obj->billedSec = $billedSec;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSec && $obj->callSec = $callSec;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $conferenceID && $obj->conferenceID = $conferenceID;
        null !== $cost && $obj->cost = $cost;
        null !== $currency && $obj->currency = $currency;
        null !== $destinationNumber && $obj->destinationNumber = $destinationNumber;
        null !== $isTelnyxBillable && $obj->isTelnyxBillable = $isTelnyxBillable;
        null !== $joinedAt && $obj->joinedAt = $joinedAt;
        null !== $leftAt && $obj->leftAt = $leftAt;
        null !== $originatingNumber && $obj->originatingNumber = $originatingNumber;
        null !== $rate && $obj->rate = $rate;
        null !== $rateMeasuredIn && $obj->rateMeasuredIn = $rateMeasuredIn;
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
     * Participant id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Duration of the conference call for billing purposes.
     */
    public function withBilledSec(int $billedSec): self
    {
        $obj = clone $this;
        $obj->billedSec = $billedSec;

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
     * Conference id.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj->conferenceID = $conferenceID;

        return $obj;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj->cost = $cost;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * Number called by the participant to join the conference.
     */
    public function withDestinationNumber(string $destinationNumber): self
    {
        $obj = clone $this;
        $obj->destinationNumber = $destinationNumber;

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
     * Participant join time.
     */
    public function withJoinedAt(\DateTimeInterface $joinedAt): self
    {
        $obj = clone $this;
        $obj->joinedAt = $joinedAt;

        return $obj;
    }

    /**
     * Participant leave time.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $obj = clone $this;
        $obj->leftAt = $leftAt;

        return $obj;
    }

    /**
     * Participant origin number used in the conference call.
     */
    public function withOriginatingNumber(string $originatingNumber): self
    {
        $obj = clone $this;
        $obj->originatingNumber = $originatingNumber;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $obj = clone $this;
        $obj->rateMeasuredIn = $rateMeasuredIn;

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
