<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ledger_billing_group_report_new_response = array{
 *   data?: LedgerBillingGroupReport
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class LedgerBillingGroupReportNewResponse implements BaseModel
{
    /** @use SdkModel<ledger_billing_group_report_new_response> */
    use SdkModel;

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
