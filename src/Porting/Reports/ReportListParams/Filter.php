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
 *   reportType?: value-of<ReportType>|null, status?: value-of<Status>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter reports of a specific type.
     *
     * @var value-of<ReportType>|null $reportType
     */
    #[Optional('report_type', enum: ReportType::class)]
    public ?string $reportType;

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
     * @param ReportType|value-of<ReportType> $reportType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ReportType|string|null $reportType = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $reportType && $self['reportType'] = $reportType;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter reports of a specific type.
     *
     * @param ReportType|value-of<ReportType> $reportType
     */
    public function withReportType(ReportType|string $reportType): self
    {
        $self = clone $this;
        $self['reportType'] = $reportType;

        return $self;
    }

    /**
     * Filter reports of a specific status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
