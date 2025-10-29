<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse\Data;

/**
 * @phpstan-type SiprecConnectorNewResponseShape = array{data: Data}
 */
final class SiprecConnectorNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SiprecConnectorNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Data $data;

    /**
     * `new SiprecConnectorNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SiprecConnectorNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SiprecConnectorNewResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
