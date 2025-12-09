<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters;
use Telnyx\Portouts\Reports\ReportCreateParams\ReportType;

/**
 * Generate reports about port-out operations.
 *
 * @see Telnyx\Services\Portouts\ReportsService::create()
 *
 * @phpstan-type ReportCreateParamsShape = array{
 *   params: ExportPortoutsCsvReport|array{filters: Filters},
 *   reportType: ReportType|value-of<ReportType>,
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
    #[Required]
    public ExportPortoutsCsvReport $params;

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
     * @param ExportPortoutsCsvReport|array{filters: Filters} $params
     * @param ReportType|value-of<ReportType> $reportType
     */
    public static function with(
        ExportPortoutsCsvReport|array $params,
        ReportType|string $reportType
    ): self {
        $self = new self;

        $self['params'] = $params;
        $self['reportType'] = $reportType;

        return $self;
    }

    /**
     * The parameters for generating a port-outs CSV report.
     *
     * @param ExportPortoutsCsvReport|array{filters: Filters} $params
     */
    public function withParams(ExportPortoutsCsvReport|array $params): self
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
