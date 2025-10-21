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
 * @see Telnyx\Portouts\Reports->create
 *
 * @phpstan-type report_create_params = array{
 *   params: ExportPortoutsCsvReport, reportType: ReportType|value-of<ReportType>
 * }
 */
final class ReportCreateParams implements BaseModel
{
    /** @use SdkModel<report_create_params> */
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
     * @var value-of<ReportType> $reportType
     */
    #[Api('report_type', enum: ReportType::class)]
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
     * @param ReportType|value-of<ReportType> $reportType
     */
    public static function with(
        ExportPortoutsCsvReport $params,
        ReportType|string $reportType
    ): self {
        $obj = new self;

        $obj->params = $params;
        $obj['reportType'] = $reportType;

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
        $obj['reportType'] = $reportType;

        return $obj;
    }
}
