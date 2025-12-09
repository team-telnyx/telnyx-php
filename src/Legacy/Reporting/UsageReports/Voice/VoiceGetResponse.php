<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VoiceGetResponseShape = array{
 *   data?: CdrUsageReportResponseLegacy|null
 * }
 */
final class VoiceGetResponse implements BaseModel
{
    /** @use SdkModel<VoiceGetResponseShape> */
    use SdkModel;

    /**
     * Legacy V2 CDR usage report response.
     */
    #[Optional]
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
     *   aggregationType?: int|null,
     *   connections?: list<string>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   productBreakdown?: int|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: mixed,
     *   startTime?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     *   aggregationType?: int|null,
     *   connections?: list<string>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endTime?: \DateTimeInterface|null,
     *   productBreakdown?: int|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: mixed,
     *   startTime?: \DateTimeInterface|null,
     *   status?: int|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(CdrUsageReportResponseLegacy|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
