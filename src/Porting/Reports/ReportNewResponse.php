<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type report_new_response = array{data?: PortingReport}
 */
final class ReportNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<report_new_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortingReport $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortingReport $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortingReport $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
