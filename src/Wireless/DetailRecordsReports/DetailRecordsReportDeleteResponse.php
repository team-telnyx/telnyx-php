<?php

declare(strict_types=1);

namespace Telnyx\Wireless\DetailRecordsReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type detail_records_report_delete_response = array{data?: WdrReport}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class DetailRecordsReportDeleteResponse implements BaseModel
{
    /** @use SdkModel<detail_records_report_delete_response> */
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
     */
    public static function with(?WdrReport $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(WdrReport $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
