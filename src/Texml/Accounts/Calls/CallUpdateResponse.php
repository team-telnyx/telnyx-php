<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse\AnsweredBy;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse\Direction;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse\Status;

/**
 * @phpstan-type CallUpdateResponseShape = array{
 *   accountSid?: string|null,
 *   answeredBy?: value-of<AnsweredBy>|null,
 *   callerName?: string|null,
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   direction?: value-of<Direction>|null,
 *   duration?: string|null,
 *   endTime?: string|null,
 *   from?: string|null,
 *   fromFormatted?: string|null,
 *   price?: string|null,
 *   priceUnit?: string|null,
 *   sid?: string|null,
 *   startTime?: string|null,
 *   status?: value-of<Status>|null,
 *   to?: string|null,
 *   toFormatted?: string|null,
 *   uri?: string|null,
 * }
 */
final class CallUpdateResponse implements BaseModel
{
    /** @use SdkModel<CallUpdateResponseShape> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The value of the answering machine detection result, if this feature was enabled for the call.
     *
     * @var value-of<AnsweredBy>|null $answeredBy
     */
    #[Optional('answered_by', enum: AnsweredBy::class)]
    public ?string $answeredBy;

    /**
     * Caller ID, if present.
     */
    #[Optional('caller_name')]
    public ?string $callerName;

    /**
     * The timestamp of when the resource was created.
     */
    #[Optional('date_created')]
    public ?string $dateCreated;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Optional('date_updated')]
    public ?string $dateUpdated;

    /**
     * The direction of this call.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Optional(enum: Direction::class)]
    public ?string $direction;

    /**
     * The duration of this call, given in seconds.
     */
    #[Optional]
    public ?string $duration;

    /**
     * The end time of this call.
     */
    #[Optional('end_time')]
    public ?string $endTime;

    /**
     * The phone number or SIP address that made this call.
     */
    #[Optional]
    public ?string $from;

    /**
     * The from number formatted for display.
     */
    #[Optional('from_formatted')]
    public ?string $fromFormatted;

    /**
     * The price of this call, the currency is specified in the price_unit field. Only populated when the call cost feature is enabled for the account.
     */
    #[Optional]
    public ?string $price;

    /**
     * The unit in which the price is given.
     */
    #[Optional('price_unit')]
    public ?string $priceUnit;

    /**
     * The identifier of this call.
     */
    #[Optional]
    public ?string $sid;

    /**
     * The start time of this call.
     */
    #[Optional('start_time')]
    public ?string $startTime;

    /**
     * The status of this call.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The phone number or SIP address that received this call.
     */
    #[Optional]
    public ?string $to;

    /**
     * The to number formatted for display.
     */
    #[Optional('to_formatted')]
    public ?string $toFormatted;

    /**
     * The relative URI for this call.
     */
    #[Optional]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AnsweredBy|value-of<AnsweredBy> $answeredBy
     * @param Direction|value-of<Direction> $direction
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $accountSid = null,
        AnsweredBy|string|null $answeredBy = null,
        ?string $callerName = null,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        Direction|string|null $direction = null,
        ?string $duration = null,
        ?string $endTime = null,
        ?string $from = null,
        ?string $fromFormatted = null,
        ?string $price = null,
        ?string $priceUnit = null,
        ?string $sid = null,
        ?string $startTime = null,
        Status|string|null $status = null,
        ?string $to = null,
        ?string $toFormatted = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $answeredBy && $self['answeredBy'] = $answeredBy;
        null !== $callerName && $self['callerName'] = $callerName;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $direction && $self['direction'] = $direction;
        null !== $duration && $self['duration'] = $duration;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $from && $self['from'] = $from;
        null !== $fromFormatted && $self['fromFormatted'] = $fromFormatted;
        null !== $price && $self['price'] = $price;
        null !== $priceUnit && $self['priceUnit'] = $priceUnit;
        null !== $sid && $self['sid'] = $sid;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;
        null !== $toFormatted && $self['toFormatted'] = $toFormatted;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The value of the answering machine detection result, if this feature was enabled for the call.
     *
     * @param AnsweredBy|value-of<AnsweredBy> $answeredBy
     */
    public function withAnsweredBy(AnsweredBy|string $answeredBy): self
    {
        $self = clone $this;
        $self['answeredBy'] = $answeredBy;

        return $self;
    }

    /**
     * Caller ID, if present.
     */
    public function withCallerName(string $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * The direction of this call.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * The duration of this call, given in seconds.
     */
    public function withDuration(string $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The end time of this call.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * The phone number or SIP address that made this call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The from number formatted for display.
     */
    public function withFromFormatted(string $fromFormatted): self
    {
        $self = clone $this;
        $self['fromFormatted'] = $fromFormatted;

        return $self;
    }

    /**
     * The price of this call, the currency is specified in the price_unit field. Only populated when the call cost feature is enabled for the account.
     */
    public function withPrice(string $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    /**
     * The unit in which the price is given.
     */
    public function withPriceUnit(string $priceUnit): self
    {
        $self = clone $this;
        $self['priceUnit'] = $priceUnit;

        return $self;
    }

    /**
     * The identifier of this call.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * The start time of this call.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * The status of this call.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The phone number or SIP address that received this call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The to number formatted for display.
     */
    public function withToFormatted(string $toFormatted): self
    {
        $self = clone $this;
        $self['toFormatted'] = $toFormatted;

        return $self;
    }

    /**
     * The relative URI for this call.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
