<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ReportCreateParams); // set properties as needed
 * $client->porting.reports->create(...$params->toArray());
 * ```
 * Generate reports about porting operations.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->porting.reports->create(...$params->toArray());`
 *
 * @see Telnyx\Porting\Reports->create
 *
 * @phpstan-type report_create_params = array{
 *   params: ExportPortingOrdersCsvReport,
 *   reportType: ReportType|value-of<ReportType>,
 * }
 */
final class ReportCreateParams implements BaseModel
{
    /** @use SdkModel<report_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The parameters for generating a porting orders CSV report.
     */
    #[Api]
    public ExportPortingOrdersCsvReport $params;

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
        ExportPortingOrdersCsvReport $params,
        ReportType|string $reportType
    ): self {
        $obj = new self;

        $obj->params = $params;
        $obj['reportType'] = $reportType;

        return $obj;
    }

    /**
     * The parameters for generating a porting orders CSV report.
     */
    public function withParams(ExportPortingOrdersCsvReport $params): self
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
