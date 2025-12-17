<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OutboundMessagePayloadShape from \Telnyx\Messages\OutboundMessagePayload
 *
 * @phpstan-type MessageSendGroupMmsResponseShape = array{
 *   data?: null|OutboundMessagePayload|OutboundMessagePayloadShape
 * }
 */
final class MessageSendGroupMmsResponse implements BaseModel
{
    /** @use SdkModel<MessageSendGroupMmsResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OutboundMessagePayload $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OutboundMessagePayload|OutboundMessagePayloadShape|null $data
     */
    public static function with(OutboundMessagePayload|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OutboundMessagePayload|OutboundMessagePayloadShape $data
     */
    public function withData(OutboundMessagePayload|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
