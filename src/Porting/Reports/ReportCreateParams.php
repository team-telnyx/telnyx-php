<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;

/**
 * Generate reports about porting operations.
 *
 * @see Telnyx\Services\Porting\ReportsService::create()
 *
 * @phpstan-type ReportCreateParamsShape = array{
 *   params: ExportPortingOrdersCsvReport|array{filters: Filters},
 *   reportType: ReportType|value-of<ReportType>,
 * }
 */
final class ReportCreateParams implements BaseModel
{
    /** @use SdkModel<ReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The parameters for generating a porting orders CSV report.
     */
    #[Required]
    public ExportPortingOrdersCsvReport $params;

    /**
     * Identifies the type of report.
     *
     * @var value-of<ReportType> $reportType
     */
    #[Required('report_type', enum: ReportType::class)]
    public string $reportType;

    /**
     * `new ReportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReportCreateParams::with(params: ..., reportType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReportCreateParams)->withParams(...)->withReportType(...)
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
     * @param ExportPortingOrdersCsvReport|array{filters: Filters} $params
     * @param ReportType|value-of<ReportType> $reportType
     */
    public static function with(
        ExportPortingOrdersCsvReport|array $params,
        ReportType|string $reportType
    ): self {
        $self = new self;

        $self['params'] = $params;
        $self['reportType'] = $reportType;

        return $self;
    }

    /**
     * The parameters for generating a porting orders CSV report.
     *
     * @param ExportPortingOrdersCsvReport|array{filters: Filters} $params
     */
    public function withParams(ExportPortingOrdersCsvReport|array $params): self
    {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }

    /**
     * Identifies the type of report.
     *
     * @param ReportType|value-of<ReportType> $reportType
     */
    public function withReportType(ReportType|string $reportType): self
    {
        $self = clone $this;
        $self['reportType'] = $reportType;

        return $self;
    }
}
