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
    /** @use SdkModel<CallRetrieveCallsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters calls by their end date. Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $endTime;

    /**
     * Filters calls by their end date (after). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $endTimeGt;

    /**
     * Filters calls by their end date (before). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $endTimeLt;

    /**
     * Filters calls by the from number.
     */
    #[Optional]
    public ?string $from;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Optional]
    public ?int $page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Used to request the next page of results.
     */
    #[Optional]
    public ?string $pageToken;

    /**
     * Filters calls by their start date. Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $startTime;

    /**
     * Filters calls by their start date (after). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $startTimeGt;

    /**
     * Filters calls by their start date (before). Expected format is YYYY-MM-DD.
     */
    #[Optional]
    public ?string $startTimeLt;

    /**
     * Filters calls by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filters calls by the to number.
     */
    #[Optional]
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
        $self = new self;

        null !== $endTime && $self['endTime'] = $endTime;
        null !== $endTimeGt && $self['endTimeGt'] = $endTimeGt;
        null !== $endTimeLt && $self['endTimeLt'] = $endTimeLt;
        null !== $from && $self['from'] = $from;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageToken && $self['pageToken'] = $pageToken;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $startTimeGt && $self['startTimeGt'] = $startTimeGt;
        null !== $startTimeLt && $self['startTimeLt'] = $startTimeLt;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Filters calls by their end date. Expected format is YYYY-MM-DD.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Filters calls by their end date (after). Expected format is YYYY-MM-DD.
     */
    public function withEndTimeGt(string $endTimeGt): self
    {
        $self = clone $this;
        $self['endTimeGt'] = $endTimeGt;

        return $self;
    }

    /**
     * Filters calls by their end date (before). Expected format is YYYY-MM-DD.
     */
    public function withEndTimeLt(string $endTimeLt): self
    {
        $self = clone $this;
        $self['endTimeLt'] = $endTimeLt;

        return $self;
    }

    /**
     * Filters calls by the from number.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $self = clone $this;
        $self['pageToken'] = $pageToken;

        return $self;
    }

    /**
     * Filters calls by their start date. Expected format is YYYY-MM-DD.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Filters calls by their start date (after). Expected format is YYYY-MM-DD.
     */
    public function withStartTimeGt(string $startTimeGt): self
    {
        $self = clone $this;
        $self['startTimeGt'] = $startTimeGt;

        return $self;
    }

    /**
     * Filters calls by their start date (before). Expected format is YYYY-MM-DD.
     */
    public function withStartTimeLt(string $startTimeLt): self
    {
        $self = clone $this;
        $self['startTimeLt'] = $startTimeLt;

        return $self;
    }

    /**
     * Filters calls by status.
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
     * Filters calls by the to number.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
