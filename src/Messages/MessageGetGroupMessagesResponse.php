<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OutboundMessagePayloadShape from \Telnyx\Messages\OutboundMessagePayload
 *
 * @phpstan-type MessageGetGroupMessagesResponseShape = array{
 *   data?: list<OutboundMessagePayload|OutboundMessagePayloadShape>|null
 * }
 */
final class MessageGetGroupMessagesResponse implements BaseModel
{
    /** @use SdkModel<MessageGetGroupMessagesResponseShape> */
    use SdkModel;

    /** @var list<OutboundMessagePayload>|null $data */
    #[Optional(list: OutboundMessagePayload::class)]
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
     * @param list<OutboundMessagePayload|OutboundMessagePayloadShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<OutboundMessagePayload|OutboundMessagePayloadShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
