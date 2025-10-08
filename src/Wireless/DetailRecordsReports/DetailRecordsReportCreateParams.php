<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new DetailRecordsReportCreateParams); // set properties as needed
 * $client->wireless.detailRecordsReports->create(...$params->toArray());
 * ```
 * Asynchronously create a report containing Wireless Detail Records (WDRs) for the SIM cards that consumed wireless data in the given time period.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->wireless.detailRecordsReports->create(...$params->toArray());`
 *
 * @see Telnyx\Wireless\DetailRecordsReports->create
 *
 * @phpstan-type detail_records_report_create_params = array{
 *   endTime?: string, startTime?: string
 * }
 */
final class DetailRecordsReportCreateParams implements BaseModel
{
    /** @use SdkModel<detail_records_report_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    #[Api('end_time', optional: true)]
    public ?string $endTime;

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

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
        ?string $endTime = null,
        ?string $startTime = null
    ): self {
        $obj = new self;

        null !== $endTime && $obj->endTime = $endTime;
        null !== $startTime && $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }
}
