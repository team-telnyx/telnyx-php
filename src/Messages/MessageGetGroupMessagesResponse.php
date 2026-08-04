<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessagingOutboundMessagePayloadShape from \Telnyx\Messages\MessagingOutboundMessagePayload
 *
 * @phpstan-type MessageGetGroupMessagesResponseShape = array{
 *   data?: list<MessagingOutboundMessagePayload|MessagingOutboundMessagePayloadShape>|null,
 * }
 */
final class MessageGetGroupMessagesResponse implements BaseModel
{
    /** @use SdkModel<MessageGetGroupMessagesResponseShape> */
    use SdkModel;

    /** @var list<MessagingOutboundMessagePayload>|null $data */
    #[Optional(list: MessagingOutboundMessagePayload::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MessagingOutboundMessagePayload|MessagingOutboundMessagePayloadShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<MessagingOutboundMessagePayload|MessagingOutboundMessagePayloadShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
