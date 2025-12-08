<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SttDetailReportResponse\Status;

/**
 * @phpstan-type SpeechToTextListResponseShape = array{
 *   data?: list<SttDetailReportResponse>|null
 * }
 */
final class SpeechToTextListResponse implements BaseModel
{
    /** @use SdkModel<SpeechToTextListResponseShape> */
    use SdkModel;

    /** @var list<SttDetailReportResponse>|null $data */
    #[Api(list: SttDetailReportResponse::class, optional: true)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<SttDetailReportResponse|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_link?: string|null,
     *   end_date?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<SttDetailReportResponse|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   download_link?: string|null,
     *   end_date?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
