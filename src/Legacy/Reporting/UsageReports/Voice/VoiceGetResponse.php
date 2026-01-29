<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CdrUsageReportResponseLegacyShape from \Telnyx\Legacy\Reporting\UsageReports\Voice\CdrUsageReportResponseLegacy
 *
 * @phpstan-type VoiceGetResponseShape = array{
 *   data?: null|CdrUsageReportResponseLegacy|CdrUsageReportResponseLegacyShape
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
     * @param CdrUsageReportResponseLegacy|CdrUsageReportResponseLegacyShape|null $data
     */
    public static function with(
        CdrUsageReportResponseLegacy|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Legacy V2 CDR usage report response.
     *
     * @param CdrUsageReportResponseLegacy|CdrUsageReportResponseLegacyShape $data
     */
    public function withData(CdrUsageReportResponseLegacy|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
