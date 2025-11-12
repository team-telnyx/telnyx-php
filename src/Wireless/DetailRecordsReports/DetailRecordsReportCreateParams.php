<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously create a report containing Wireless Detail Records (WDRs) for the SIM cards that consumed wireless data in the given time period.
 *
 * @see Telnyx\STAINLESS_FIXME_Wireless\DetailRecordsReportsService::create()
 *
 * @phpstan-type DetailRecordsReportCreateParamsShape = array{
 *   end_time?: string, start_time?: string
 * }
 */
final class DetailRecordsReportCreateParams implements BaseModel
{
    /** @use SdkModel<DetailRecordsReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    #[Api(optional: true)]
    public ?string $end_time;

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    #[Api(optional: true)]
    public ?string $start_time;

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
        ?string $end_time = null,
        ?string $start_time = null
    ): self {
        $obj = new self;

        null !== $end_time && $obj->end_time = $end_time;
        null !== $start_time && $obj->start_time = $start_time;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->end_time = $endTime;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->start_time = $startTime;

        return $obj;
    }
}
