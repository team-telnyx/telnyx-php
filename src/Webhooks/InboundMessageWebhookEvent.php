<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InboundMessageShape from \Telnyx\Webhooks\InboundMessage
 *
 * @phpstan-type InboundMessageWebhookEventShape = array{
 *   data?: null|InboundMessage|InboundMessageShape
 * }
 */
final class InboundMessageWebhookEvent implements BaseModel
{
    /** @use SdkModel<InboundMessageWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?InboundMessage $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InboundMessage|InboundMessageShape|null $data
     */
    public static function with(InboundMessage|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param InboundMessage|InboundMessageShape $data
     */
    public function withData(InboundMessage|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
