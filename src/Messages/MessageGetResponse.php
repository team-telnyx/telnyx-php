<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InboundMessagePayload;
use Telnyx\Messages\MessageGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Messages\MessageGetResponse\Data
 *
 * @phpstan-type MessageGetResponseShape = array{
 *   data?: null|DataShape|OutboundMessagePayload|InboundMessagePayload
 * }
 */
final class MessageGetResponse implements BaseModel
{
    /** @use SdkModel<MessageGetResponseShape> */
    use SdkModel;

    #[Optional(union: Data::class)]
    public OutboundMessagePayload|InboundMessagePayload|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DataShape $data
     */
    public static function with(
        OutboundMessagePayload|array|InboundMessagePayload|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(
        OutboundMessagePayload|array|InboundMessagePayload $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
