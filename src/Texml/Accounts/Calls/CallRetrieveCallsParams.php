<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status;

/**
 * Returns multiple call resouces for an account. This endpoint is eventually consistent.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::retrieveCalls()
 *
 * @phpstan-type CallRetrieveCallsParamsShape = array{
 *   EndTime?: string,
 *   EndTime_gt?: string,
 *   EndTime_lt?: string,
 *   From?: string,
 *   Page?: int,
 *   PageSize?: int,
 *   PageToken?: string,
 *   StartTime?: string,
 *   StartTime_gt?: string,
 *   StartTime_lt?: string,
 *   Status?: \Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status|value-of<\Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams\Status>,
 *   To?: string,
 * }
 */
final class CallRetrieveCallsParams implements BaseModel
{
    /** @use SdkModel<CallRetrieveCallsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters calls by their end date. Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $EndTime;

    /**
     * Filters calls by their end date (after). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $EndTime_gt;

    /**
     * Filters calls by their end date (before). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $EndTime_lt;

    /**
     * Filters calls by the from number.
     */
    #[Optional]
    public ?string $From;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Optional]
    public ?int $Page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Optional]
    public ?int $PageSize;

    /**
     * Used to request the next page of results.
     */
    #[Optional]
    public ?string $PageToken;

    /**
     * Filters calls by their start date. Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $StartTime;

    /**
     * Filters calls by their start date (after). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $StartTime_gt;

    /**
     * Filters calls by their start date (before). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $StartTime_lt;

    /**
     * Filters calls by status.
     *
     * @var value-of<Status>|null $Status
     */
    #[Optional(
        enum: Status::class
    )]
    public ?string $Status;

    /**
     * Filters calls by the to number.
     */
    #[Optional]
    public ?string $To;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $Status
     */
    public static function with(
        ?string $EndTime = null,
        ?string $EndTime_gt = null,
        ?string $EndTime_lt = null,
        ?string $From = null,
        ?int $Page = null,
        ?int $PageSize = null,
        ?string $PageToken = null,
        ?string $StartTime = null,
        ?string $StartTime_gt = null,
        ?string $StartTime_lt = null,
        Status|string|null $Status = null,
        ?string $To = null,
    ): self {
        $obj = new self;

        null !== $EndTime && $obj['EndTime'] = $EndTime;
        null !== $EndTime_gt && $obj['EndTime_gt'] = $EndTime_gt;
        null !== $EndTime_lt && $obj['EndTime_lt'] = $EndTime_lt;
        null !== $From && $obj['From'] = $From;
        null !== $Page && $obj['Page'] = $Page;
        null !== $PageSize && $obj['PageSize'] = $PageSize;
        null !== $PageToken && $obj['PageToken'] = $PageToken;
        null !== $StartTime && $obj['StartTime'] = $StartTime;
        null !== $StartTime_gt && $obj['StartTime_gt'] = $StartTime_gt;
        null !== $StartTime_lt && $obj['StartTime_lt'] = $StartTime_lt;
        null !== $Status && $obj['Status'] = $Status;
        null !== $To && $obj['To'] = $To;

        return $obj;
    }

    /**
     * Filters calls by their end date. Expected format is YYYY-MM-DD.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['EndTime'] = $endTime;

        return $obj;
    }

    /**
     * Filters calls by their end date (after). Expected format is YYYY-MM-DD.
     */
    public function withEndTimeGt(string $endTimeGt): self
    {
        $obj = clone $this;
        $obj['EndTime_gt'] = $endTimeGt;

        return $obj;
    }

    /**
     * Filters calls by their end date (before). Expected format is YYYY-MM-DD.
     */
    public function withEndTimeLt(string $endTimeLt): self
    {
        $obj = clone $this;
        $obj['EndTime_lt'] = $endTimeLt;

        return $obj;
    }

    /**
     * Filters calls by the from number.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['From'] = $from;

        return $obj;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['Page'] = $page;

        return $obj;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['PageSize'] = $pageSize;

        return $obj;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $obj = clone $this;
        $obj['PageToken'] = $pageToken;

        return $obj;
    }

    /**
     * Filters calls by their start date. Expected format is YYYY-MM-DD.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['StartTime'] = $startTime;

        return $obj;
    }

    /**
     * Filters calls by their start date (after). Expected format is YYYY-MM-DD.
     */
    public function withStartTimeGt(string $startTimeGt): self
    {
        $obj = clone $this;
        $obj['StartTime_gt'] = $startTimeGt;

        return $obj;
    }

    /**
     * Filters calls by their start date (before). Expected format is YYYY-MM-DD.
     */
    public function withStartTimeLt(string $startTimeLt): self
    {
        $obj = clone $this;
        $obj['StartTime_lt'] = $startTimeLt;

        return $obj;
    }

    /**
     * Filters calls by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status
    ): self {
        $obj = clone $this;
        $obj['Status'] = $status;

        return $obj;
    }

    /**
     * Filters calls by the to number.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['To'] = $to;

        return $obj;
    }
}
