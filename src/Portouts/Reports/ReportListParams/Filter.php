<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ReportListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Portouts\Reports\ReportListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status].
 *
 * @phpstan-type filter_alias = array{
 *   reportType?: value-of<ReportType>, status?: value-of<Status>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter reports of a specific type.
     *
     * @var value-of<ReportType>|null $reportType
     */
    #[Api('report_type', enum: ReportType::class, optional: true)]
    public ?string $reportType;

    /**
     * Filter reports of a specific status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
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
     * @param ReportType|value-of<ReportType> $reportType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ReportType|string|null $reportType = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $reportType && $obj['reportType'] = $reportType;
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
        $obj['reportType'] = $reportType;

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
