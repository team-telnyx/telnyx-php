<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type detail_records_report_list_response = array{
 *   data?: list<WdrReport>|null
 * }
 */
final class DetailRecordsReportListResponse implements BaseModel
{
    /** @use SdkModel<detail_records_report_list_response> */
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
     * @param list<WdrReport> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<WdrReport> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
