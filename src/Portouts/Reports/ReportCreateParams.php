<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ReportCreateParams\ReportType;

/**
 * Generate reports about port-out operations.
 *
 * @see Telnyx\STAINLESS_FIXME_Portouts\ReportsService::create()
 *
 * @phpstan-type ReportCreateParamsShape = array{
 *   params: ExportPortoutsCsvReport, report_type: ReportType|value-of<ReportType>
 * }
 */
final class ReportCreateParams implements BaseModel
{
    /** @use SdkModel<ReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The parameters for generating a port-outs CSV report.
     */
    #[Api]
    public ExportPortoutsCsvReport $params;

    /**
     * Identifies the type of report.
     *
     * @var value-of<ReportType> $report_type
     */
    #[Api(enum: ReportType::class)]
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
     * @param ReportType|value-of<ReportType> $report_type
     */
    public static function with(
        ExportPortoutsCsvReport $params,
        ReportType|string $report_type
    ): self {
        $obj = new self;

        $obj->params = $params;
        $obj['report_type'] = $report_type;

        return $obj;
    }

    /**
     * The parameters for generating a port-outs CSV report.
     */
    public function withParams(ExportPortoutsCsvReport $params): self
    {
        $obj = clone $this;
        $obj->params = $params;

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
