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
 *   report_type: ReportType|value-of<ReportType>,
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
     * @var value-of<ReportType> $report_type
     */
    #[Required(enum: ReportType::class)]
    public string $report_type;

    /**
     * `new ReportCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReportCreateParams::with(params: ..., report_type: ...)
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
     * @param ReportType|value-of<ReportType> $report_type
     */
    public static function with(
        ExportPortingOrdersCsvReport|array $params,
        ReportType|string $report_type
    ): self {
        $obj = new self;

        $obj['params'] = $params;
        $obj['report_type'] = $report_type;

        return $obj;
    }

    /**
     * The parameters for generating a porting orders CSV report.
     *
     * @param ExportPortingOrdersCsvReport|array{filters: Filters} $params
     */
    public function withParams(ExportPortingOrdersCsvReport|array $params): self
    {
        $obj = clone $this;
        $obj['params'] = $params;

        return $obj;
    }

    /**
     * Identifies the type of report.
     *
     * @param ReportType|value-of<ReportType> $reportType
     */
    public function withReportType(ReportType|string $reportType): self
    {
        $obj = clone $this;
        $obj['report_type'] = $reportType;

        return $obj;
    }
}
