<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Wireless\DetailRecordsReports\WdrReport\Status;

/**
 * @phpstan-type DetailRecordsReportListResponseShape = array{
 *   data?: list<WdrReport>|null
 * }
 */
final class DetailRecordsReportListResponse implements BaseModel
{
    /** @use SdkModel<DetailRecordsReportListResponseShape> */
    use SdkModel;

    /** @var list<WdrReport>|null $data */
    #[Optional(list: WdrReport::class)]
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
     * @param list<WdrReport|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<WdrReport|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
