<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MessagingDeleteResponseShape = array{
 *   data?: MdrUsageReportResponseLegacy|null
 * }
 */
final class MessagingDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Legacy V2 MDR usage report response.
     */
    #[Api(optional: true)]
    public ?MdrUsageReportResponseLegacy $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MdrUsageReportResponseLegacy $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * Legacy V2 MDR usage report response.
     */
    public function withData(MdrUsageReportResponseLegacy $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
