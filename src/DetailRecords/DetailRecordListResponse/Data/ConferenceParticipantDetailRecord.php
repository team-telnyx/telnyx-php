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
        $obj = new self;

        $obj['recordType'] = $recordType;

        null !== $id && $obj['id'] = $id;
        null !== $billedSec && $obj['billedSec'] = $billedSec;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSec && $obj['callSec'] = $callSec;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $conferenceID && $obj['conferenceID'] = $conferenceID;
        null !== $cost && $obj['cost'] = $cost;
        null !== $currency && $obj['currency'] = $currency;
        null !== $destinationNumber && $obj['destinationNumber'] = $destinationNumber;
        null !== $isTelnyxBillable && $obj['isTelnyxBillable'] = $isTelnyxBillable;
        null !== $joinedAt && $obj['joinedAt'] = $joinedAt;
        null !== $leftAt && $obj['leftAt'] = $leftAt;
        null !== $originatingNumber && $obj['originatingNumber'] = $originatingNumber;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rateMeasuredIn && $obj['rateMeasuredIn'] = $rateMeasuredIn;
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
     * Participant id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Duration of the conference call for billing purposes.
     */
    public function withBilledSec(int $billedSec): self
    {
        $obj = clone $this;
        $obj['billedSec'] = $billedSec;

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
     * Conference id.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conferenceID'] = $conferenceID;

        return $obj;
    }

    /**
     * Currency amount for Telnyx billing cost.
     */
    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing cost.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Number called by the participant to join the conference.
     */
    public function withDestinationNumber(string $destinationNumber): self
    {
        $obj = clone $this;
        $obj['destinationNumber'] = $destinationNumber;

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
     * Participant join time.
     */
    public function withJoinedAt(\DateTimeInterface $joinedAt): self
    {
        $obj = clone $this;
        $obj['joinedAt'] = $joinedAt;

        return $obj;
    }

    /**
     * Participant leave time.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $obj = clone $this;
        $obj['leftAt'] = $leftAt;

        return $obj;
    }

    /**
     * Participant origin number used in the conference call.
     */
    public function withOriginatingNumber(string $originatingNumber): self
    {
        $obj = clone $this;
        $obj['originatingNumber'] = $originatingNumber;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $obj = clone $this;
        $obj['rateMeasuredIn'] = $rateMeasuredIn;

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
