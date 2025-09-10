<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallGetCallsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call\AnsweredBy;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call\Direction;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call\Status;

/**
 * @phpstan-type call_alias = array{
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
final class Call implements BaseModel
{
    /** @use SdkModel<call_alias> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    /**
     * The value of the answering machine detection result, if this feature was enabled for the call.
     *
     * @var value-of<AnsweredBy>|null $answeredBy
     */
    #[Api('answered_by', enum: AnsweredBy::class, optional: true)]
    public ?string $answeredBy;

    /**
     * Caller ID, if present.
     */
    #[Api('caller_name', optional: true)]
    public ?string $callerName;

    /**
     * The timestamp of when the resource was created.
     */
    #[Api('date_created', optional: true)]
    public ?string $dateCreated;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Api('date_updated', optional: true)]
    public ?string $dateUpdated;

    /**
     * The direction of this call.
     *
     * @var value-of<Direction>|null $direction
     */
    #[Api(enum: Direction::class, optional: true)]
    public ?string $direction;

    /**
     * The duration of this call, given in seconds.
     */
    #[Api(optional: true)]
    public ?string $duration;

    /**
     * The end time of this call.
     */
    #[Api('end_time', optional: true)]
    public ?string $endTime;

    /**
     * The phone number or SIP address that made this call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The from number formatted for display.
     */
    #[Api('from_formatted', optional: true)]
    public ?string $fromFormatted;

    /**
     * The price of this call, the currency is specified in the price_unit field. Only populated when the call cost feature is enabled for the account.
     */
    #[Api(optional: true)]
    public ?string $price;

    /**
     * The unit in which the price is given.
     */
    #[Api('price_unit', optional: true)]
    public ?string $priceUnit;

    /**
     * The identifier of this call.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The start time of this call.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

    /**
     * The status of this call.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The phone number or SIP address that received this call.
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * The to number formatted for display.
     */
    #[Api('to_formatted', optional: true)]
    public ?string $toFormatted;

    /**
     * The relative URI for this call.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $answeredBy && $obj->answeredBy = $answeredBy instanceof AnsweredBy ? $answeredBy->value : $answeredBy;
        null !== $callerName && $obj->callerName = $callerName;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $direction && $obj->direction = $direction instanceof Direction ? $direction->value : $direction;
        null !== $duration && $obj->duration = $duration;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $from && $obj->from = $from;
        null !== $fromFormatted && $obj->fromFormatted = $fromFormatted;
        null !== $price && $obj->price = $price;
        null !== $priceUnit && $obj->priceUnit = $priceUnit;
        null !== $sid && $obj->sid = $sid;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $to && $obj->to = $to;
        null !== $toFormatted && $obj->toFormatted = $toFormatted;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    /**
     * The value of the answering machine detection result, if this feature was enabled for the call.
     *
     * @param AnsweredBy|value-of<AnsweredBy> $answeredBy
     */
    public function withAnsweredBy(AnsweredBy|string $answeredBy): self
    {
        $obj = clone $this;
        $obj->answeredBy = $answeredBy instanceof AnsweredBy ? $answeredBy->value : $answeredBy;

        return $obj;
    }

    /**
     * Caller ID, if present.
     */
    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj->callerName = $callerName;

        return $obj;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj->dateCreated = $dateCreated;

        return $obj;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj->dateUpdated = $dateUpdated;

        return $obj;
    }

    /**
     * The direction of this call.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $obj = clone $this;
        $obj->direction = $direction instanceof Direction ? $direction->value : $direction;

        return $obj;
    }

    /**
     * The duration of this call, given in seconds.
     */
    public function withDuration(string $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    /**
     * The end time of this call.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * The phone number or SIP address that made this call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The from number formatted for display.
     */
    public function withFromFormatted(string $fromFormatted): self
    {
        $obj = clone $this;
        $obj->fromFormatted = $fromFormatted;

        return $obj;
    }

    /**
     * The price of this call, the currency is specified in the price_unit field. Only populated when the call cost feature is enabled for the account.
     */
    public function withPrice(string $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    /**
     * The unit in which the price is given.
     */
    public function withPriceUnit(string $priceUnit): self
    {
        $obj = clone $this;
        $obj->priceUnit = $priceUnit;

        return $obj;
    }

    /**
     * The identifier of this call.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj->sid = $sid;

        return $obj;
    }

    /**
     * The start time of this call.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * The status of this call.
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
     * The phone number or SIP address that received this call.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The to number formatted for display.
     */
    public function withToFormatted(string $toFormatted): self
    {
        $obj = clone $this;
        $obj->toFormatted = $toFormatted;

        return $obj;
    }

    /**
     * The relative URI for this call.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
