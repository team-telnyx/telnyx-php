<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional(list: SttDetailReportResponse::class)]
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
     *   createdAt?: \DateTimeInterface|null,
     *   downloadLink?: string|null,
     *   endDate?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<SttDetailReportResponse|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   downloadLink?: string|null,
     *   endDate?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
