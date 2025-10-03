<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type mdr_usage_report_fetch_sync_response = array{
 *   data?: MdrUsageReport
 * }
 */
final class MdrUsageReportFetchSyncResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<mdr_usage_report_fetch_sync_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?MdrUsageReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MdrUsageReport $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MdrUsageReport $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
