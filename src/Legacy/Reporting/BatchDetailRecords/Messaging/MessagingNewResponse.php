<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Direction;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\RecordType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Status;

/**
 * @phpstan-type MessagingNewResponseShape = array{
 *   data?: MdrDetailReportResponse|null
 * }
 */
final class MessagingNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?MdrDetailReportResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MdrDetailReportResponse|array{
     *   id?: string|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   directions?: list<value-of<Direction>>|null,
     *   end_date?: \DateTimeInterface|null,
     *   filters?: list<Filter>|null,
     *   profiles?: list<string>|null,
     *   record_type?: string|null,
     *   record_types?: list<value-of<RecordType>>|null,
     *   report_name?: string|null,
     *   report_url?: string|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        MdrDetailReportResponse|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MdrDetailReportResponse|array{
     *   id?: string|null,
     *   connections?: list<int>|null,
     *   created_at?: \DateTimeInterface|null,
     *   directions?: list<value-of<Direction>>|null,
     *   end_date?: \DateTimeInterface|null,
     *   filters?: list<Filter>|null,
     *   profiles?: list<string>|null,
     *   record_type?: string|null,
     *   record_types?: list<value-of<RecordType>>|null,
     *   report_name?: string|null,
     *   report_url?: string|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(MdrDetailReportResponse|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
