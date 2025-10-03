<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown;

use Telnyx\ChargesBreakdown\ChargesBreakdownRetrieveParams\Format;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ChargesBreakdownRetrieveParams); // set properties as needed
 * $client->chargesBreakdown->retrieve(...$params->toArray());
 * ```
 * Retrieve a detailed breakdown of monthly charges for phone numbers in a specified date range. The date range cannot exceed 31 days.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->chargesBreakdown->retrieve(...$params->toArray());`
 *
 * @see Telnyx\ChargesBreakdown->retrieve
 *
 * @phpstan-type charges_breakdown_retrieve_params = array{
 *   startDate: \DateTimeInterface,
 *   endDate?: \DateTimeInterface,
 *   format?: Format|value-of<Format>,
 * }
 */
final class ChargesBreakdownRetrieveParams implements BaseModel
{
    /** @use SdkModel<charges_breakdown_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Start date for the charges breakdown in ISO date format (YYYY-MM-DD).
     */
    #[Api]
    public \DateTimeInterface $startDate;

    /**
     * End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $endDate;

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
     * @param Format|value-of<Format> $format
     */
    public static function with(
        \DateTimeInterface $startDate,
        ?\DateTimeInterface $endDate = null,
        Format|string|null $format = null,
    ): self {
        $obj = new self;

        $obj->startDate = $startDate;

        null !== $endDate && $obj->endDate = $endDate;
        null !== $format && $obj['format'] = $format;

        return $obj;
    }

    /**
     * Start date for the charges breakdown in ISO date format (YYYY-MM-DD).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * End date for the charges breakdown in ISO date format (YYYY-MM-DD). If not provided, defaults to start_date + 1 month. The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

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
