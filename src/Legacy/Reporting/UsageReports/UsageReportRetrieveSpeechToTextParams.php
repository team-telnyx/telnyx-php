<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generate and fetch speech to text usage report synchronously. This endpoint will both generate and fetch the speech to text report over a specified time period.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReportsService::retrieveSpeechToText()
 *
 * @phpstan-type UsageReportRetrieveSpeechToTextParamsShape = array{
 *   end_date?: \DateTimeInterface, start_date?: \DateTimeInterface
 * }
 */
final class UsageReportRetrieveSpeechToTextParams implements BaseModel
{
    /** @use SdkModel<UsageReportRetrieveSpeechToTextParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?\DateTimeInterface $end_date;

    #[Api(optional: true)]
    public ?\DateTimeInterface $start_date;

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
        ?\DateTimeInterface $end_date = null,
        ?\DateTimeInterface $start_date = null
    ): self {
        $obj = new self;

        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $start_date && $obj['start_date'] = $start_date;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }
}
