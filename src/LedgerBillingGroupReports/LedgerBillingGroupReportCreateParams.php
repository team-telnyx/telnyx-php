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
 *   month?: int, year?: int
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
        $obj = new self;

        null !== $month && $obj['month'] = $month;
        null !== $year && $obj['year'] = $year;

        return $obj;
    }

    /**
     * Month of the ledger billing group report.
     */
    public function withMonth(int $month): self
    {
        $obj = clone $this;
        $obj['month'] = $month;

        return $obj;
    }

    /**
     * Year of the ledger billing group report.
     */
    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj['year'] = $year;

        return $obj;
    }
}
