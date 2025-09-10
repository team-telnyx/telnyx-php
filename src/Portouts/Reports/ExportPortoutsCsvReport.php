<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters;

/**
 * The parameters for generating a port-outs CSV report.
 *
 * @phpstan-type export_portouts_csv_report = array{filters: Filters}
 */
final class ExportPortoutsCsvReport implements BaseModel
{
    /** @use SdkModel<export_portouts_csv_report> */
    use SdkModel;

    /**
     * The filters to apply to the export port-out CSV report.
     */
    #[Api]
    public Filters $filters;

    /**
     * `new ExportPortoutsCsvReport()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExportPortoutsCsvReport::with(filters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExportPortoutsCsvReport)->withFilters(...)
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
     */
    public static function with(Filters $filters): self
    {
        $obj = new self;

        $obj->filters = $filters;

        return $obj;
    }

    /**
     * The filters to apply to the export port-out CSV report.
     */
    public function withFilters(Filters $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }
}
