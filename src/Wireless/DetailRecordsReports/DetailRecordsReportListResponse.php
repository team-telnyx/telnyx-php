<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
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
    #[Api(list: WdrReport::class, optional: true)]
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
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   start_time?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<WdrReport|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   end_time?: string|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   start_time?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
