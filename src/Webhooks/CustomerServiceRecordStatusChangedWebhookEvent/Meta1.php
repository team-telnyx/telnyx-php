<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type Meta1Shape = array{attempt?: int|null, delivered_to?: string|null}
 */
final class Meta1 implements BaseModel
{
    /** @use SdkModel<Meta1Shape> */
    use SdkModel;

    /**
     * The number of times the callback webhook has been attempted.
     */
    #[Optional]
    public ?int $attempt;

    /**
     * The URL that the callback webhook was delivered to.
     */
    #[Optional]
    public ?string $delivered_to;

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
        ?string $delivered_to = null
    ): self {
        $obj = new self;

        null !== $attempt && $obj['attempt'] = $attempt;
        null !== $delivered_to && $obj['delivered_to'] = $delivered_to;

        return $obj;
    }

    /**
     * The number of times the callback webhook has been attempted.
     */
    public function withAttempt(int $attempt): self
    {
        $obj = clone $this;
        $obj['attempt'] = $attempt;

        return $obj;
    }

    /**
     * The URL that the callback webhook was delivered to.
     */
    public function withDeliveredTo(string $deliveredTo): self
    {
        $obj = clone $this;
        $obj['delivered_to'] = $deliveredTo;

        return $obj;
    }
}
