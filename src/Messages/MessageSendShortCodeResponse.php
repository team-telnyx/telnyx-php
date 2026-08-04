<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessagingOutboundMessagePayloadShape from \Telnyx\Messages\MessagingOutboundMessagePayload
 *
 * @phpstan-type MessageSendShortCodeResponseShape = array{
 *   data?: null|MessagingOutboundMessagePayload|MessagingOutboundMessagePayloadShape,
 * }
 */
final class MessageSendShortCodeResponse implements BaseModel
{
    /** @use SdkModel<MessageSendShortCodeResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MessagingOutboundMessagePayload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingOutboundMessagePayload|MessagingOutboundMessagePayloadShape|null $data
     */
    public static function with(
        MessagingOutboundMessagePayload|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingOutboundMessagePayload|MessagingOutboundMessagePayloadShape $data
     */
    public function withData(MessagingOutboundMessagePayload|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
