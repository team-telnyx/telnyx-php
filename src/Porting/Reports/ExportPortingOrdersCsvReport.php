<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters;

/**
 * The parameters for generating a porting orders CSV report.
 *
 * @phpstan-type ExportPortingOrdersCsvReportShape = array{filters: Filters}
 */
final class ExportPortingOrdersCsvReport implements BaseModel
{
    /** @use SdkModel<ExportPortingOrdersCsvReportShape> */
    use SdkModel;

    /**
     * The filters to apply to the export porting order CSV report.
     */
    #[Api]
    public Filters $filters;

    /**
     * `new ExportPortingOrdersCsvReport()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExportPortingOrdersCsvReport::with(filters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExportPortingOrdersCsvReport)->withFilters(...)
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
     * The filters to apply to the export porting order CSV report.
     */
    public function withFilters(Filters $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }
}
