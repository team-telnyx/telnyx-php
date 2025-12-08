<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Wireless\DetailRecordsReports\WdrReport\Status;

/**
 * @phpstan-type DetailRecordsReportDeleteResponseShape = array{
 *   data?: WdrReport|null
 * }
 */
final class DetailRecordsReportDeleteResponse implements BaseModel
{
    /** @use SdkModel<DetailRecordsReportDeleteResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   start_time?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
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
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   start_time?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(WdrReport|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
