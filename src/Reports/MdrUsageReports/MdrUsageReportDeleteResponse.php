<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Result;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Status;

/**
 * @phpstan-type MdrUsageReportDeleteResponseShape = array{
 *   data?: MdrUsageReport|null
 * }
 */
final class MdrUsageReportDeleteResponse implements BaseModel
{
    /** @use SdkModel<MdrUsageReportDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?MdrUsageReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MdrUsageReport|array{
     *   id?: string|null,
     *   aggregation_type?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   profiles?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(MdrUsageReport|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MdrUsageReport|array{
     *   id?: string|null,
     *   aggregation_type?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   profiles?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(MdrUsageReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
