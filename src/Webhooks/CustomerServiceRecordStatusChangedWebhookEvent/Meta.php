<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{attempt?: int|null, deliveredTo?: string|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The number of times the callback webhook has been attempted.
     */
    #[Optional]
    public ?int $attempt;

    /**
     * The URL that the callback webhook was delivered to.
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
     * The number of times the callback webhook has been attempted.
     */
    public function withAttempt(int $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * The URL that the callback webhook was delivered to.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $self = clone $this;
        $self['deliveredTo'] = $deliveredTo;

        return $self;
    }
}
