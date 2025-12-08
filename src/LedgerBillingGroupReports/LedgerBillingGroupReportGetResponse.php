<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport\RecordType;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport\Status;

/**
 * @phpstan-type LedgerBillingGroupReportGetResponseShape = array{
 *   data?: LedgerBillingGroupReport|null
 * }
 */
final class LedgerBillingGroupReportGetResponse implements BaseModel
{
    /** @use SdkModel<LedgerBillingGroupReportGetResponseShape> */
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
     *
     * @param LedgerBillingGroupReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   organization_id?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   report_url?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        LedgerBillingGroupReport|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param LedgerBillingGroupReport|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   organization_id?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   report_url?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(LedgerBillingGroupReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
