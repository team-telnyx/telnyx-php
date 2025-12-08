<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\ReportListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Porting\Reports\ReportListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   report_type?: value-of<ReportType>|null, status?: value-of<Status>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter reports of a specific type.
     *
     * @var value-of<ReportType>|null $report_type
     */
    #[Optional(enum: ReportType::class)]
    public ?string $report_type;

    /**
     * Filter reports of a specific status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ReportType|value-of<ReportType> $report_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ReportType|string|null $report_type = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $report_type && $obj['report_type'] = $report_type;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter reports of a specific type.
     *
     * @param ReportType|value-of<ReportType> $reportType
     */
    public function withReportType(ReportType|string $reportType): self
    {
        $obj = clone $this;
        $obj['report_type'] = $reportType;

        return $obj;
    }

    /**
     * Filter reports of a specific status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
