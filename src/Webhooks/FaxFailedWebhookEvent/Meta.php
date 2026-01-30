<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Metadata about the webhook delivery.
 *
 * @phpstan-type MetaShape = array{attempt?: int|null, deliveredTo?: string|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The delivery attempt number.
     */
    #[Optional]
    public ?int $attempt;

    /**
     * The URL the webhook was delivered to.
     */
    #[Optional('delivered_to')]
    public ?string $deliveredTo;

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
        ?int $attempt = null,
        ?string $deliveredTo = null
    ): self {
        $self = new self;

        null !== $attempt && $self['attempt'] = $attempt;
        null !== $deliveredTo && $self['deliveredTo'] = $deliveredTo;

        return $self;
    }

    /**
     * The delivery attempt number.
     */
    public function withAttempt(int $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * The URL the webhook was delivered to.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $self = clone $this;
        $self['deliveredTo'] = $deliveredTo;

        return $self;
    }
}
