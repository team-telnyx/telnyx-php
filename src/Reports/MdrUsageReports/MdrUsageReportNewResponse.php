<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Result;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport\Status;

/**
 * @phpstan-type MdrUsageReportNewResponseShape = array{data?: MdrUsageReport|null}
 */
final class MdrUsageReportNewResponse implements BaseModel
{
    /** @use SdkModel<MdrUsageReportNewResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   aggregationType?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   profiles?: string|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<Result>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     *   aggregationType?: value-of<AggregationType>|null,
     *   connections?: list<int>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   profiles?: string|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<Result>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(MdrUsageReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
