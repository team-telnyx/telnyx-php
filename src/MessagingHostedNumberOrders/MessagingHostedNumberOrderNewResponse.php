<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrder;

/**
 * @phpstan-import-type MessagingHostedNumberOrderShape from \Telnyx\MessagingHostedNumberOrder
 *
 * @phpstan-type MessagingHostedNumberOrderNewResponseShape = array{
 *   data?: null|MessagingHostedNumberOrder|MessagingHostedNumberOrderShape
 * }
 */
final class MessagingHostedNumberOrderNewResponse implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MessagingHostedNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingHostedNumberOrder|MessagingHostedNumberOrderShape|null $data
     */
    public static function with(
        MessagingHostedNumberOrder|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingHostedNumberOrder|MessagingHostedNumberOrderShape $data
     */
    public function withData(MessagingHostedNumberOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
