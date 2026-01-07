<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WdrReportShape from \Telnyx\Wireless\DetailRecordsReports\WdrReport
 *
 * @phpstan-type DetailRecordsReportListResponseShape = array{
 *   data?: list<WdrReport|WdrReportShape>|null
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
     * @param list<WdrReport|WdrReportShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<WdrReport|WdrReportShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
