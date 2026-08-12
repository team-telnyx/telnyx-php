<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageGetResponse\Data;
use Telnyx\Messages\MessageGetResponse\Data\MessagingInboundMessagePayload;

/**
 * @phpstan-import-type DataVariants from \Telnyx\Messages\MessageGetResponse\Data
 * @phpstan-import-type DataShape from \Telnyx\Messages\MessageGetResponse\Data
 *
 * @phpstan-type MessageGetResponseShape = array{data?: DataShape|null}
 */
final class MessageGetResponse implements BaseModel
{
    /** @use SdkModel<MessageGetResponseShape> */
    use SdkModel;

    /** @var DataVariants|null $data */
    #[Optional(union: Data::class)]
    public MessagingOutboundMessagePayload|MessagingInboundMessagePayload|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DataShape|null $data
     */
    public static function with(
        MessagingOutboundMessagePayload|array|MessagingInboundMessagePayload|null $data = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(
        MessagingOutboundMessagePayload|array|MessagingInboundMessagePayload $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
