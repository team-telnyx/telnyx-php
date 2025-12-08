<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
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
     *   aggregation_type?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   product_breakdown?: value-of<ProductBreakdown>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: array<string,mixed>|null,
     *   start_time?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   aggregation_type?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   product_breakdown?: value-of<ProductBreakdown>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: array<string,mixed>|null,
     *   start_time?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
