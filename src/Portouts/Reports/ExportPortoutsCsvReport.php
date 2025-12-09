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
     *   createdAtGt?: \DateTimeInterface|null,
     *   createdAtLt?: \DateTimeInterface|null,
     *   customerReferenceIn?: list<string>|null,
     *   endUserName?: string|null,
     *   phoneNumbersOverlaps?: list<string>|null,
     *   statusIn?: list<value-of<StatusIn>>|null,
     * } $filters
     */
    public static function with(Filters|array $filters): self
    {
        $self = new self;

        $self['filters'] = $filters;

        return $self;
    }

    /**
     * The filters to apply to the export port-out CSV report.
     *
     * @param Filters|array{
     *   createdAtGt?: \DateTimeInterface|null,
     *   createdAtLt?: \DateTimeInterface|null,
     *   customerReferenceIn?: list<string>|null,
     *   endUserName?: string|null,
     *   phoneNumbersOverlaps?: list<string>|null,
     *   statusIn?: list<value-of<StatusIn>>|null,
     * } $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }
}
