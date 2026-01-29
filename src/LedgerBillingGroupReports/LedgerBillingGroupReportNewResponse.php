<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LedgerBillingGroupReportShape from \Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport
 *
 * @phpstan-type LedgerBillingGroupReportNewResponseShape = array{
 *   data?: null|LedgerBillingGroupReport|LedgerBillingGroupReportShape
 * }
 */
final class LedgerBillingGroupReportNewResponse implements BaseModel
{
    /** @use SdkModel<LedgerBillingGroupReportNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?LedgerBillingGroupReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param LedgerBillingGroupReport|LedgerBillingGroupReportShape|null $data
     */
    public static function with(
        LedgerBillingGroupReport|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param LedgerBillingGroupReport|LedgerBillingGroupReportShape $data
     */
    public function withData(LedgerBillingGroupReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
