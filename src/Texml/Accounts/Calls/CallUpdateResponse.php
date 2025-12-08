<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse\AnsweredBy;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse\Direction;
use Telnyx\Texml\Accounts\Calls\CallUpdateResponse\Status;

/**
 * @phpstan-type CallUpdateResponseShape = array{
 *   account_sid?: string|null,
 *   answered_by?: value-of<AnsweredBy>|null,
 *   caller_name?: string|null,
 *   date_created?: string|null,
 *   date_updated?: string|null,
 *   direction?: value-of<Direction>|null,
 *   duration?: string|null,
 *   end_time?: string|null,
 *   from?: string|null,
 *   from_formatted?: string|null,
 *   price?: string|null,
 *   price_unit?: string|null,
 *   sid?: string|null,
 *   start_time?: string|null,
 *   status?: value-of<Status>|null,
 *   to?: string|null,
 *   to_formatted?: string|null,
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
    #[Api(optional: true)]
    public ?string $account_sid;

    /**
     * The value of the answering machine detection result, if this feature was enabled for the call.
     *
     * @var value-of<AnsweredBy>|null $answered_by
     */
    #[Api(enum: AnsweredBy::class, optional: true)]
    public ?string $answered_by;

    /**
     * Caller ID, if present.
     */
    #[Api(optional: true)]
    public ?string $caller_name;

    /**
     * The timestamp of when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $date_created;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?string $date_updated;

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
    #[Api(optional: true)]
    public ?string $end_time;

    /**
     * The phone number or SIP address that made this call.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The from number formatted for display.
     */
    #[Api(optional: true)]
    public ?string $from_formatted;

    /**
     * The price of this call, the currency is specified in the price_unit field. Only populated when the call cost feature is enabled for the account.
     */
    #[Api(optional: true)]
    public ?string $price;

    /**
     * The unit in which the price is given.
     */
    #[Api(optional: true)]
    public ?string $price_unit;

    /**
     * The identifier of this call.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The start time of this call.
     */
    #[Api(optional: true)]
    public ?string $start_time;

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
    #[Api(optional: true)]
    public ?string $to_formatted;

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
     * @param AnsweredBy|value-of<AnsweredBy> $answered_by
     * @param Direction|value-of<Direction> $direction
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $account_sid = null,
        AnsweredBy|string|null $answered_by = null,
        ?string $caller_name = null,
        ?string $date_created = null,
        ?string $date_updated = null,
        Direction|string|null $direction = null,
        ?string $duration = null,
        ?string $end_time = null,
        ?string $from = null,
        ?string $from_formatted = null,
        ?string $price = null,
        ?string $price_unit = null,
        ?string $sid = null,
        ?string $start_time = null,
        Status|string|null $status = null,
        ?string $to = null,
        ?string $to_formatted = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $answered_by && $obj['answered_by'] = $answered_by;
        null !== $caller_name && $obj['caller_name'] = $caller_name;
        null !== $date_created && $obj['date_created'] = $date_created;
        null !== $date_updated && $obj['date_updated'] = $date_updated;
        null !== $direction && $obj['direction'] = $direction;
        null !== $duration && $obj['duration'] = $duration;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $from && $obj['from'] = $from;
        null !== $from_formatted && $obj['from_formatted'] = $from_formatted;
        null !== $price && $obj['price'] = $price;
        null !== $price_unit && $obj['price_unit'] = $price_unit;
        null !== $sid && $obj['sid'] = $sid;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj['to'] = $to;
        null !== $to_formatted && $obj['to_formatted'] = $to_formatted;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

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
        $obj['answered_by'] = $answeredBy;

        return $obj;
    }

    /**
     * Caller ID, if present.
     */
    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj['caller_name'] = $callerName;

        return $obj;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj['date_created'] = $dateCreated;

        return $obj;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj['date_updated'] = $dateUpdated;

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
        $obj['direction'] = $direction;

        return $obj;
    }

    /**
     * The duration of this call, given in seconds.
     */
    public function withDuration(string $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * The end time of this call.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * The phone number or SIP address that made this call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The from number formatted for display.
     */
    public function withFromFormatted(string $fromFormatted): self
    {
        $obj = clone $this;
        $obj['from_formatted'] = $fromFormatted;

        return $obj;
    }

    /**
     * The price of this call, the currency is specified in the price_unit field. Only populated when the call cost feature is enabled for the account.
     */
    public function withPrice(string $price): self
    {
        $obj = clone $this;
        $obj['price'] = $price;

        return $obj;
    }

    /**
     * The unit in which the price is given.
     */
    public function withPriceUnit(string $priceUnit): self
    {
        $obj = clone $this;
        $obj['price_unit'] = $priceUnit;

        return $obj;
    }

    /**
     * The identifier of this call.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    /**
     * The start time of this call.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The phone number or SIP address that received this call.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The to number formatted for display.
     */
    public function withToFormatted(string $toFormatted): self
    {
        $obj = clone $this;
        $obj['to_formatted'] = $toFormatted;

        return $obj;
    }

    /**
     * The relative URI for this call.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
