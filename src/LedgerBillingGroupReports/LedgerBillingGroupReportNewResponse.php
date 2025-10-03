<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ledger_billing_group_report_new_response = array{
 *   data?: LedgerBillingGroupReport
 * }
 */
final class LedgerBillingGroupReportNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ledger_billing_group_report_new_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?LedgerBillingGroupReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?LedgerBillingGroupReport $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(LedgerBillingGroupReport $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
