<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown;

use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a detailed breakdown of monthly charges for phone numbers in a specified date range. The date range cannot exceed 31 days.
 *
 * @see Telnyx\Services\ChargesBreakdownService::retrieve()
 *
 * @phpstan-type ChargesBreakdownRetrieveParamsShape = array{
 *   start_date: \DateTimeInterface,
 *   end_date?: \DateTimeInterface,
 *   format?: Format|value-of<Format>,
 * }
 */
final class ChargesBreakdownRetrieveParams implements BaseModel
{
    /** @use SdkModel<ChargesBreakdownRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Start date for the charges breakdown in ISO date format (YYYY-MM-DD).
     */
    #[Api]
    public \DateTimeInterface $start_date;

    /**
     * End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $end_date;

    /**
     * Response format.
     *
     * @var value-of<Format>|null $format
     */
    #[Api(enum: Format::class, optional: true)]
    public ?string $format;

    /**
     * `new ChargesBreakdownRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargesBreakdownRetrieveParams::with(start_date: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChargesBreakdownRetrieveParams)->withStartDate(...)
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
     *
     * @param Format|value-of<Format> $format
     */
    public static function with(
        \DateTimeInterface $start_date,
        ?\DateTimeInterface $end_date = null,
        Format|string|null $format = null,
    ): self {
        $obj = new self;

        $obj['start_date'] = $start_date;

        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $format && $obj['format'] = $format;

        return $obj;
    }

    /**
     * Start date for the charges breakdown in ISO date format (YYYY-MM-DD).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    /**
     * End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    /**
     * Response format.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }
}
