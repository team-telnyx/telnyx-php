<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status;

/**
 * Returns multiple call resouces for an account. This endpoint is eventually consistent.
 *
 * @see Telnyx\Texml\Accounts\Calls->retrieveCalls
 *
 * @phpstan-type call_retrieve_calls_params = array{
 *   endTime?: string,
 *   endTimeGt?: string,
 *   endTimeLt?: string,
 *   from?: string,
 *   page?: int,
 *   pageSize?: int,
 *   pageToken?: string,
 *   startTime?: string,
 *   startTimeGt?: string,
 *   startTimeLt?: string,
 *   status?: Status|value-of<Status>,
 *   to?: string,
 * }
 */
final class CallRetrieveCallsParams implements BaseModel
{
    /** @use SdkModel<call_retrieve_calls_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters calls by their end date. Expected format is YYYY-MM-DD.
     */
    #[Api(optional: true)]
    public ?string $endTime;

    /**
     * Filters calls by their end date (after). Expected format is YYYY-MM-DD.
     */
    #[Api(optional: true)]
    public ?string $endTimeGt;

    /**
     * Filters calls by their end date (before). Expected format is YYYY-MM-DD.
     */
    #[Api(optional: true)]
    public ?string $endTimeLt;

    /**
     * Filters calls by the from number.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Api(optional: true)]
    public ?int $pageSize;

    /**
     * Used to request the next page of results.
     */
    #[Api(optional: true)]
    public ?string $pageToken;

    /**
     * Filters calls by their start date. Expected format is YYYY-MM-DD.
     */
    #[Api(optional: true)]
    public ?string $startTime;

    /**
     * Filters calls by their start date (after). Expected format is YYYY-MM-DD.
     */
    #[Api(optional: true)]
    public ?string $startTimeGt;

    /**
     * Filters calls by their start date (before). Expected format is YYYY-MM-DD.
     */
    #[Api(optional: true)]
    public ?string $startTimeLt;

    /**
     * Filters calls by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Filters calls by the to number.
     */
    #[Api(optional: true)]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $endTime = null,
        ?string $endTimeGt = null,
        ?string $endTimeLt = null,
        ?string $from = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
        ?string $startTime = null,
        ?string $startTimeGt = null,
        ?string $startTimeLt = null,
        Status|string|null $status = null,
        ?string $to = null,
    ): self {
        $obj = new self;

        null !== $endTime && $obj->endTime = $endTime;
        null !== $endTimeGt && $obj->endTimeGt = $endTimeGt;
        null !== $endTimeLt && $obj->endTimeLt = $endTimeLt;
        null !== $from && $obj->from = $from;
        null !== $page && $obj->page = $page;
        null !== $pageSize && $obj->pageSize = $pageSize;
        null !== $pageToken && $obj->pageToken = $pageToken;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $startTimeGt && $obj->startTimeGt = $startTimeGt;
        null !== $startTimeLt && $obj->startTimeLt = $startTimeLt;
        null !== $status && $obj['status'] = $status;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * Filters calls by their end date. Expected format is YYYY-MM-DD.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * Filters calls by their end date (after). Expected format is YYYY-MM-DD.
     */
    public function withEndTimeGt(string $endTimeGt): self
    {
        $obj = clone $this;
        $obj->endTimeGt = $endTimeGt;

        return $obj;
    }

    /**
     * Filters calls by their end date (before). Expected format is YYYY-MM-DD.
     */
    public function withEndTimeLt(string $endTimeLt): self
    {
        $obj = clone $this;
        $obj->endTimeLt = $endTimeLt;

        return $obj;
    }

    /**
     * Filters calls by the from number.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $obj = clone $this;
        $obj->pageToken = $pageToken;

        return $obj;
    }

    /**
     * Filters calls by their start date. Expected format is YYYY-MM-DD.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * Filters calls by their start date (after). Expected format is YYYY-MM-DD.
     */
    public function withStartTimeGt(string $startTimeGt): self
    {
        $obj = clone $this;
        $obj->startTimeGt = $startTimeGt;

        return $obj;
    }

    /**
     * Filters calls by their start date (before). Expected format is YYYY-MM-DD.
     */
    public function withStartTimeLt(string $startTimeLt): self
    {
        $obj = clone $this;
        $obj->startTimeLt = $startTimeLt;

        return $obj;
    }

    /**
     * Filters calls by status.
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
     * Filters calls by the to number.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
