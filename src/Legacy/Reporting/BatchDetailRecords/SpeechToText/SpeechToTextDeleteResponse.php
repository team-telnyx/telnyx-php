<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SttDetailReportResponse\Status;

/**
 * @phpstan-type SpeechToTextDeleteResponseShape = array{
 *   data?: SttDetailReportResponse|null
 * }
 */
final class SpeechToTextDeleteResponse implements BaseModel
{
    /** @use SdkModel<SpeechToTextDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     * @param SttDetailReportResponse|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_link?: string|null,
     *   end_date?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     * } $data
     */
    public static function with(
        SttDetailReportResponse|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SttDetailReportResponse|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_link?: string|null,
     *   end_date?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     * } $data
     */
    public function withData(SttDetailReportResponse|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
