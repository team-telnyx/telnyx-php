<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a summary of monthly charges for a specified date range. The date range cannot exceed 31 days.
 *
 * @see Telnyx\ChargesSummaryService::retrieve()
 *
 * @phpstan-type ChargesSummaryRetrieveParamsShape = array{
 *   end_date: \DateTimeInterface, start_date: \DateTimeInterface
 * }
 */
final class ChargesSummaryRetrieveParams implements BaseModel
{
    /** @use SdkModel<ChargesSummaryRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    #[Api]
    public \DateTimeInterface $end_date;

    /**
     * Start date for the charges summary in ISO date format (YYYY-MM-DD).
     */
    #[Api]
    public \DateTimeInterface $start_date;

    /**
     * `new ChargesSummaryRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargesSummaryRetrieveParams::with(end_date: ..., start_date: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChargesSummaryRetrieveParams)->withEndDate(...)->withStartDate(...)
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
        \DateTimeInterface $end_date,
        \DateTimeInterface $start_date
    ): self {
        $obj = new self;

        $obj->end_date = $end_date;
        $obj->start_date = $start_date;

        return $obj;
    }

    /**
     * End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->end_date = $endDate;

        return $obj;
    }

    /**
     * Start date for the charges summary in ISO date format (YYYY-MM-DD).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->start_date = $startDate;

        return $obj;
    }
}
