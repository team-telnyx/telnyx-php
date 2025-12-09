<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Wireless\DetailRecordsReports\WdrReport\Status;

/**
 * @phpstan-type DetailRecordsReportGetResponseShape = array{data?: WdrReport|null}
 */
final class DetailRecordsReportGetResponse implements BaseModel
{
    /** @use SdkModel<DetailRecordsReportGetResponseShape> */
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
     * @param WdrReport|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(WdrReport|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param WdrReport|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   endTime?: string|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(WdrReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
