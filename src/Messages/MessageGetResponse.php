<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;

/**
 * @phpstan-type message_get_response = array{
 *   data?: OutboundMessagePayload|InboundMessagePayload
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MessageGetResponse implements BaseModel
{
    /** @use SdkModel<message_get_response> */
    use SdkModel;

    #[Api(optional: true)]
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
