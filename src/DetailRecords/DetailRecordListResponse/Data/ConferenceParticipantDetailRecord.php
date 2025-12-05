<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceParticipantDetailRecordShape = array{
 *   record_type: string,
 *   id?: string|null,
 *   billed_sec?: int|null,
 *   call_leg_id?: string|null,
 *   call_sec?: int|null,
 *   call_session_id?: string|null,
 *   conference_id?: string|null,
 *   cost?: string|null,
 *   currency?: string|null,
 *   destination_number?: string|null,
 *   is_telnyx_billable?: bool|null,
 *   joined_at?: \DateTimeInterface|null,
 *   left_at?: \DateTimeInterface|null,
 *   originating_number?: string|null,
 *   rate?: string|null,
 *   rate_measured_in?: string|null,
 *   user_id?: string|null,
 * }
 */
final class ConferenceParticipantDetailRecord implements BaseModel
{
    /** @use SdkModel<ConferenceParticipantDetailRecordShape> */
    use SdkModel;

    #[Api]
    public string $record_type;

    /**
     * Participant id.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Duration of the conference call for billing purposes.
     */
    #[Api(optional: true)]
    public ?int $billed_sec;

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
     * Conference id.
     */
    #[Api(optional: true)]
    public ?string $conference_id;

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
    #[Api(optional: true)]
    public ?string $destination_number;

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    #[Api(optional: true)]
    public ?bool $is_telnyx_billable;

    /**
     * Participant join time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $joined_at;

    /**
     * Participant leave time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $left_at;

    /**
     * Participant origin number used in the conference call.
     */
    #[Api(optional: true)]
    public ?string $originating_number;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing cost.
     */
    #[Api(optional: true)]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing cost.
     */
    #[Api(optional: true)]
    public ?string $rate_measured_in;

    /**
     * User id.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    /**
     * `new ConferenceParticipantDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceParticipantDetailRecord::with(record_type: ...)
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
        string $record_type = 'conference_participant_detail_record',
        ?string $id = null,
        ?int $billed_sec = null,
        ?string $call_leg_id = null,
        ?int $call_sec = null,
        ?string $call_session_id = null,
        ?string $conference_id = null,
        ?string $cost = null,
        ?string $currency = null,
        ?string $destination_number = null,
        ?bool $is_telnyx_billable = null,
        ?\DateTimeInterface $joined_at = null,
        ?\DateTimeInterface $left_at = null,
        ?string $originating_number = null,
        ?string $rate = null,
        ?string $rate_measured_in = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        $obj['record_type'] = $record_type;

        null !== $id && $obj['id'] = $id;
        null !== $billed_sec && $obj['billed_sec'] = $billed_sec;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_sec && $obj['call_sec'] = $call_sec;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $conference_id && $obj['conference_id'] = $conference_id;
        null !== $cost && $obj['cost'] = $cost;
        null !== $currency && $obj['currency'] = $currency;
        null !== $destination_number && $obj['destination_number'] = $destination_number;
        null !== $is_telnyx_billable && $obj['is_telnyx_billable'] = $is_telnyx_billable;
        null !== $joined_at && $obj['joined_at'] = $joined_at;
        null !== $left_at && $obj['left_at'] = $left_at;
        null !== $originating_number && $obj['originating_number'] = $originating_number;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rate_measured_in && $obj['rate_measured_in'] = $rate_measured_in;
        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

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
        $obj['billed_sec'] = $billedSec;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies the conference call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * Duration of the conference call in seconds.
     */
    public function withCallSec(int $callSec): self
    {
        $obj = clone $this;
        $obj['call_sec'] = $callSec;

        return $obj;
    }

    /**
     * Telnyx UUID that identifies with conference call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

        return $obj;
    }

    /**
     * Conference id.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conference_id'] = $conferenceID;

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
        $obj['destination_number'] = $destinationNumber;

        return $obj;
    }

    /**
     * Indicates whether Telnyx billing charges might be applicable.
     */
    public function withIsTelnyxBillable(bool $isTelnyxBillable): self
    {
        $obj = clone $this;
        $obj['is_telnyx_billable'] = $isTelnyxBillable;

        return $obj;
    }

    /**
     * Participant join time.
     */
    public function withJoinedAt(\DateTimeInterface $joinedAt): self
    {
        $obj = clone $this;
        $obj['joined_at'] = $joinedAt;

        return $obj;
    }

    /**
     * Participant leave time.
     */
    public function withLeftAt(\DateTimeInterface $leftAt): self
    {
        $obj = clone $this;
        $obj['left_at'] = $leftAt;

        return $obj;
    }

    /**
     * Participant origin number used in the conference call.
     */
    public function withOriginatingNumber(string $originatingNumber): self
    {
        $obj = clone $this;
        $obj['originating_number'] = $originatingNumber;

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
        $obj['rate_measured_in'] = $rateMeasuredIn;

        return $obj;
    }

    /**
     * User id.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
