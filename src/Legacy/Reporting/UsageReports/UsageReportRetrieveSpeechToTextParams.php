<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generate and fetch speech to text usage report synchronously. This endpoint will both generate and fetch the speech to text report over a specified time period.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReportsService::retrieveSpeechToText()
 *
 * @phpstan-type UsageReportRetrieveSpeechToTextParamsShape = array{
 *   endDate?: \DateTimeInterface, startDate?: \DateTimeInterface
 * }
 */
final class UsageReportRetrieveSpeechToTextParams implements BaseModel
{
    /** @use SdkModel<UsageReportRetrieveSpeechToTextParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?\DateTimeInterface $endDate;

    #[Optional]
    public ?\DateTimeInterface $startDate;

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
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null
    ): self {
        $obj = new self;

        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $startDate && $obj['startDate'] = $startDate;

        return $obj;
    }

    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

        return $obj;
    }

    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

        return $obj;
    }
}
