<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type mdr_usage_report_delete_response = array{data?: MdrUsageReport}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MdrUsageReportDeleteResponse implements BaseModel
{
    /** @use SdkModel<mdr_usage_report_delete_response> */
    use SdkModel;

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
