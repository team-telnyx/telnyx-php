<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Direction;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\RecordType;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MdrDetailReportResponse\Status;

/**
 * @phpstan-type MessagingNewResponseShape = array{
 *   data?: MdrDetailReportResponse|null
 * }
 */
final class MessagingNewResponse implements BaseModel
{
    /** @use SdkModel<MessagingNewResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   createdAt?: \DateTimeInterface|null,
     *   directions?: list<value-of<Direction>>|null,
     *   endDate?: \DateTimeInterface|null,
     *   filters?: list<Filter>|null,
     *   profiles?: list<string>|null,
     *   recordType?: string|null,
     *   recordTypes?: list<value-of<RecordType>>|null,
     *   reportName?: string|null,
     *   reportURL?: string|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        MdrDetailReportResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MdrDetailReportResponse|array{
     *   id?: string|null,
     *   connections?: list<int>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   directions?: list<value-of<Direction>>|null,
     *   endDate?: \DateTimeInterface|null,
     *   filters?: list<Filter>|null,
     *   profiles?: list<string>|null,
     *   recordType?: string|null,
     *   recordTypes?: list<value-of<RecordType>>|null,
     *   reportName?: string|null,
     *   reportURL?: string|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(MdrDetailReportResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
