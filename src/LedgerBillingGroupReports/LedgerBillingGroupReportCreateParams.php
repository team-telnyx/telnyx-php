<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new LedgerBillingGroupReportCreateParams); // set properties as needed
 * $client->ledgerBillingGroupReports->create(...$params->toArray());
 * ```
 * Create a ledger billing group report.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ledgerBillingGroupReports->create(...$params->toArray());`
 *
 * @see Telnyx\LedgerBillingGroupReports->create
 *
 * @phpstan-type ledger_billing_group_report_create_params = array{
 *   month?: int, year?: int
 * }
 */
final class LedgerBillingGroupReportCreateParams implements BaseModel
{
    /** @use SdkModel<ledger_billing_group_report_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Month of the ledger billing group report.
     */
    #[Api(optional: true)]
    public ?int $month;

    /**
     * Year of the ledger billing group report.
     */
    #[Api(optional: true)]
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

        null !== $month && $obj->month = $month;
        null !== $year && $obj->year = $year;

        return $obj;
    }

    /**
     * Month of the ledger billing group report.
     */
    public function withMonth(int $month): self
    {
        $obj = clone $this;
        $obj->month = $month;

        return $obj;
    }

    /**
     * Year of the ledger billing group report.
     */
    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj->year = $year;

        return $obj;
    }
}
