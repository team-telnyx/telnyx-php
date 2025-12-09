<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously create a report containing Wireless Detail Records (WDRs) for the SIM cards that consumed wireless data in the given time period.
 *
 * @see Telnyx\Services\Wireless\DetailRecordsReportsService::create()
 *
 * @phpstan-type DetailRecordsReportCreateParamsShape = array{
 *   endTime?: string, startTime?: string
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
    #[Optional('end_time')]
    public ?string $endTime;

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    #[Optional('start_time')]
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
        $self = new self;

        null !== $endTime && $self['endTime'] = $endTime;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating the end time.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating the start time.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
