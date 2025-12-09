<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse\Data\Status;

/**
 * @phpstan-type CdrUsageReportFetchSyncResponseShape = array{data?: Data|null}
 */
final class CdrUsageReportFetchSyncResponse implements BaseModel
{
    /** @use SdkModel<CdrUsageReportFetchSyncResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   aggregationType?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   productBreakdown?: value-of<ProductBreakdown>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: array<string,mixed>|null,
     *   startTime?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   aggregationType?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   productBreakdown?: value-of<ProductBreakdown>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: array<string,mixed>|null,
     *   startTime?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
