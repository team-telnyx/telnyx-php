<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingDeleteResponseShape = array{
 *   data?: MdrUsageReportResponseLegacy|null
 * }
 */
final class MessagingDeleteResponse implements BaseModel
{
    /** @use SdkModel<MessagingDeleteResponseShape> */
    use SdkModel;

    /**
     * Legacy V2 MDR usage report response.
     */
    #[Api(optional: true)]
    public ?MdrUsageReportResponseLegacy $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: mixed,
     *   start_time?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        MdrUsageReportResponseLegacy|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * Legacy V2 MDR usage report response.
     *
     * @param MdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   profiles?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: mixed,
     *   start_time?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(MdrUsageReportResponseLegacy|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
