<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload\Number\Status;

/**
 * @phpstan-type NumberShape = array{
 *   status?: null|Status|value-of<Status>, value?: string|null
 * }
 */
final class Number implements BaseModel
{
    /** @use SdkModel<NumberShape> */
    use SdkModel;

    /**
     * Current status of this phone number within the order.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Phone number in +E.164 format.
     */
    #[Optional]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        Status|string|null $status = null,
        ?string $value = null
    ): self {
        $self = new self;

        null !== $status && $self['status'] = $status;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Current status of this phone number within the order.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
