<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown;

use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a detailed breakdown of monthly charges for phone numbers in a specified date range. The date range cannot exceed 31 days.
 *
 * @see Telnyx\Services\ChargesBreakdownService::retrieve()
 *
 * @phpstan-type ChargesBreakdownRetrieveParamsShape = array{
 *   startDate: string,
 *   endDate?: string|null,
 *   format?: null|Format|value-of<Format>,
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
    #[Required]
    public string $startDate;

    /**
     * End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Response format.
     *
     * @var value-of<Format>|null $format
     */
    #[Optional(enum: Format::class)]
    public ?string $format;

    /**
     * `new ChargesBreakdownRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargesBreakdownRetrieveParams::with(startDate: ...)
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
     * @param Format|value-of<Format>|null $format
     */
    public static function with(
        string $startDate,
        ?string $endDate = null,
        Format|string|null $format = null
    ): self {
        $self = new self;

        $self['startDate'] = $startDate;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $format && $self['format'] = $format;

        return $self;
    }

    /**
     * Start date for the charges breakdown in ISO date format (YYYY-MM-DD).
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Response format.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
