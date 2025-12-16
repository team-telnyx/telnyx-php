<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MdrUsageReportResponseLegacyShape from \Telnyx\Legacy\Reporting\UsageReports\Messaging\MdrUsageReportResponseLegacy
 *
 * @phpstan-type MessagingDeleteResponseShape = array{
 *   data?: null|MdrUsageReportResponseLegacy|MdrUsageReportResponseLegacyShape
 * }
 */
final class MessagingDeleteResponse implements BaseModel
{
    /** @use SdkModel<MessagingDeleteResponseShape> */
    use SdkModel;

    /**
     * Legacy V2 MDR usage report response.
     */
    #[Optional]
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
     * @param MdrUsageReportResponseLegacyShape $data
     */
    public static function with(
        MdrUsageReportResponseLegacy|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Legacy V2 MDR usage report response.
     *
     * @param MdrUsageReportResponseLegacyShape $data
     */
    public function withData(MdrUsageReportResponseLegacy|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
