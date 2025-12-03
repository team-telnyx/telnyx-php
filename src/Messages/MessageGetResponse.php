<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\InboundMessagePayload;
use Telnyx\Messages\MessageGetResponse\Data;

/**
 * @phpstan-type MessageGetResponseShape = array{
 *   data?: null|OutboundMessagePayload|InboundMessagePayload
 * }
 */
final class MessageGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessageGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(union: Data::class, optional: true)]
    public OutboundMessagePayload|InboundMessagePayload|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        OutboundMessagePayload|InboundMessagePayload|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(
        OutboundMessagePayload|InboundMessagePayload $data
    ): self {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
