<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a ledger billing group report.
 *
 * @see Telnyx\Services\LedgerBillingGroupReportsService::create()
 *
 * @phpstan-type LedgerBillingGroupReportCreateParamsShape = array{
 *   month?: int|null, year?: int|null
 * }
 */
final class LedgerBillingGroupReportCreateParams implements BaseModel
{
    /** @use SdkModel<LedgerBillingGroupReportCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Month of the ledger billing group report.
     */
    #[Optional]
    public ?int $month;

    /**
     * Year of the ledger billing group report.
     */
    #[Optional]
    public ?int $year;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $month = null, ?int $year = null): self
    {
        $self = new self;

        null !== $month && $self['month'] = $month;
        null !== $year && $self['year'] = $year;

        return $self;
    }

    /**
     * Month of the ledger billing group report.
     */
    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * Year of the ledger billing group report.
     */
    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
