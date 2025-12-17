<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters;

/**
 * The parameters for generating a porting orders CSV report.
 *
 * @phpstan-import-type FiltersShape from \Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters
 *
 * @phpstan-type ExportPortingOrdersCsvReportShape = array{
 *   filters: Filters|FiltersShape
 * }
 */
final class ExportPortingOrdersCsvReport implements BaseModel
{
    /** @use SdkModel<ExportPortingOrdersCsvReportShape> */
    use SdkModel;

    /**
     * The filters to apply to the export porting order CSV report.
     */
    #[Required]
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
     *
     * @param Filters|FiltersShape $filters
     */
    public static function with(Filters|array $filters): self
    {
        $self = new self;

        $self['filters'] = $filters;

        return $self;
    }

    /**
     * The filters to apply to the export porting order CSV report.
     *
     * @param Filters|FiltersShape $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }
}
