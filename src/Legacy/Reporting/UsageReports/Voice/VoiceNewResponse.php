<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type VoiceNewResponseShape = array{
 *   data?: CdrUsageReportResponseLegacy|null
 * }
 */
final class VoiceNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VoiceNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Legacy V2 CDR usage report response.
     */
    #[Api(optional: true)]
    public ?CdrUsageReportResponseLegacy $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   product_breakdown?: int|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: mixed,
     *   start_time?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        CdrUsageReportResponseLegacy|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * Legacy V2 CDR usage report response.
     *
     * @param CdrUsageReportResponseLegacy|array{
     *   id?: string|null,
     *   aggregation_type?: int|null,
     *   connections?: list<string>|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_time?: \DateTimeInterface|null,
     *   product_breakdown?: int|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: mixed,
     *   start_time?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(CdrUsageReportResponseLegacy|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
