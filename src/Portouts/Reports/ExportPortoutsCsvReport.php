<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters\StatusIn;

/**
 * The parameters for generating a port-outs CSV report.
 *
 * @phpstan-type ExportPortoutsCsvReportShape = array{filters: Filters}
 */
final class ExportPortoutsCsvReport implements BaseModel
{
    /** @use SdkModel<ExportPortoutsCsvReportShape> */
    use SdkModel;

    /**
     * The filters to apply to the export port-out CSV report.
     */
    #[Required]
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
     *
     * @param Filters|array{
     *   created_at__gt?: \DateTimeInterface|null,
     *   created_at__lt?: \DateTimeInterface|null,
     *   customer_reference__in?: list<string>|null,
     *   end_user_name?: string|null,
     *   phone_numbers__overlaps?: list<string>|null,
     *   status__in?: list<value-of<StatusIn>>|null,
     * } $filters
     */
    public static function with(Filters|array $filters): self
    {
        $obj = new self;

        $obj['filters'] = $filters;

        return $obj;
    }

    /**
     * The filters to apply to the export port-out CSV report.
     *
     * @param Filters|array{
     *   created_at__gt?: \DateTimeInterface|null,
     *   created_at__lt?: \DateTimeInterface|null,
     *   customer_reference__in?: list<string>|null,
     *   end_user_name?: string|null,
     *   phone_numbers__overlaps?: list<string>|null,
     *   status__in?: list<value-of<StatusIn>>|null,
     * } $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $obj = clone $this;
        $obj['filters'] = $filters;

        return $obj;
    }
}
