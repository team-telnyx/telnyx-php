<?php

declare(strict_types=1);

namespace Telnyx\LedgerBillingGroupReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport\RecordType;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReport\Status;

/**
 * @phpstan-type LedgerBillingGroupReportNewResponseShape = array{
 *   data?: LedgerBillingGroupReport|null
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
     * @param LedgerBillingGroupReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   organizationID?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   reportURL?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        LedgerBillingGroupReport|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param LedgerBillingGroupReport|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   organizationID?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   reportURL?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(LedgerBillingGroupReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
