<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WdrReportShape from \Telnyx\Wireless\DetailRecordsReports\WdrReport
 *
 * @phpstan-type DetailRecordsReportDeleteResponseShape = array{
 *   data?: null|WdrReport|WdrReportShape
 * }
 */
final class DetailRecordsReportDeleteResponse implements BaseModel
{
    /** @use SdkModel<DetailRecordsReportDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WdrReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WdrReport|WdrReportShape|null $data
     */
    public static function with(WdrReport|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WdrReport|WdrReportShape $data
     */
    public function withData(WdrReport|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
