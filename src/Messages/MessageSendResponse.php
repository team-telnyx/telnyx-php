<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type message_send_response = array{data?: OutboundMessagePayload}
 */
final class MessageSendResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<message_send_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?OutboundMessagePayload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?OutboundMessagePayload $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(OutboundMessagePayload $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
