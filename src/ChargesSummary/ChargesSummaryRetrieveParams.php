<?php

declare(strict_types=1);

namespace Telnyx\ChargesSummary;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ChargesSummaryRetrieveParams); // set properties as needed
 * $client->chargesSummary->retrieve(...$params->toArray());
 * ```
 * Retrieve a summary of monthly charges for a specified date range. The date range cannot exceed 31 days.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->chargesSummary->retrieve(...$params->toArray());`
 *
 * @see Telnyx\ChargesSummary->retrieve
 *
 * @phpstan-type charges_summary_retrieve_params = array{
 *   endDate: \DateTimeInterface, startDate: \DateTimeInterface
 * }
 */
final class ChargesSummaryRetrieveParams implements BaseModel
{
    /** @use SdkModel<charges_summary_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    #[Api]
    public \DateTimeInterface $endDate;

    /**
     * Start date for the charges summary in ISO date format (YYYY-MM-DD).
     */
    #[Api]
    public \DateTimeInterface $startDate;

    /**
     * `new ChargesSummaryRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargesSummaryRetrieveParams::with(endDate: ..., startDate: ...)
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
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate
    ): self {
        $obj = new self;

        $obj->endDate = $endDate;
        $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * End date for the charges summary in ISO date format (YYYY-MM-DD). The date is exclusive, data for the end_date itself is not included in the report. The interval between start_date and end_date cannot exceed 31 days.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * Start date for the charges summary in ISO date format (YYYY-MM-DD).
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }
}
