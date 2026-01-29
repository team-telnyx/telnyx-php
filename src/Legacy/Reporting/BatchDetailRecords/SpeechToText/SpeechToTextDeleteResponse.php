<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SttDetailReportResponseShape from \Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SttDetailReportResponse
 *
 * @phpstan-type SpeechToTextDeleteResponseShape = array{
 *   data?: null|SttDetailReportResponse|SttDetailReportResponseShape
 * }
 */
final class SpeechToTextDeleteResponse implements BaseModel
{
    /** @use SdkModel<SpeechToTextDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SttDetailReportResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SttDetailReportResponse|SttDetailReportResponseShape|null $data
     */
    public static function with(
        SttDetailReportResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SttDetailReportResponse|SttDetailReportResponseShape $data
     */
    public function withData(SttDetailReportResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
